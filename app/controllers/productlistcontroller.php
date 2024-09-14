<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\FileUpload;
use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\ProductModel;
use PHPMVC\Models\ProductsCategoriesModel;

class ProductListController extends AbstractController
{
    use InputFilter, Helper, Validate;

    private $_createValidationRules = [
        'CategoryId'    => 'req|int',
        'Name'          => 'req|alphanum|between(3,50)',
        'NameAr'        => 'req|alphanum|between(3,50)',
        'BarCode'       => 'alphanum',
        'Quantity'      => 'req|int',
        'BuyPrice'      => 'req|num',
        'SellPrice'     => 'req|num',
        'Unit'          => 'req|int',
    ];

    public function defaultAction()
    {
        $this->language->load("productlist.default");

        $this->_data['products'] = ProductModel::getAll();

        $this->_view();
    }

    public function createAction()
    {

        $this->language->load("productlist.create");
        $this->language->load("productlist.labels");
        $this->language->load("productlist.unit");
        $this->language->load("productlist.messages");
        $this->language->load("validation.errors");

        $this->_data['categories'] = ProductsCategoriesModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_createValidationRules, $_POST)) {
            $product = new ProductModel();
            $product->CategoryId    = $this->filterInt($_POST['CategoryId']);
            $product->Name          = $this->filterString($_POST['Name']);
            $product->NameAr        = $this->filterString($_POST['NameAr']);
            $product->BarCode        = $this->filterString($_POST['BarCode']);
            $product->Quantity      = $this->filterInt($_POST['Quantity']);
            $product->BuyPrice      = $this->filterFloat($_POST['BuyPrice']);
            $product->SellPrice     = $this->filterFloat($_POST['SellPrice']);
            $product->Unit          = $this->filterInt($_POST['Unit']);

            $category = ProductsCategoriesModel::getByPK($product->CategoryId);
            $uploadErrors = false;
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $upload = new FileUpload($_FILES['image'], $category);
                try {
                    $upload->upload();
                    $product->Image = $upload->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadErrors = true;
                }
            }

            if ($product->save() && $uploadErrors === false) {
                $this->messenger->add($this->language->get('text_save_success'));
                $this->redirect('/productlist');
            } else {
                $this->messenger->add($this->language->get('text_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $product = ProductModel::getByPK($id);

        if ($product === false) {
            $this->redirect('/productlist');
        }

        $this->language->load("productlist.edit");
        $this->language->load("productlist.labels");
        $this->language->load("productlist.messages");
        $this->language->load("productlist.unit");
        $this->language->load("validation.errors");

        $this->_data['categories'] = ProductsCategoriesModel::getAll();
        $this->_data['productCategory'] = ProductsCategoriesModel::getByPK($product->CategoryId);
        $this->_data['product'] = $product;

        if (isset($_POST['submit']) && $this->isValid($this->_createValidationRules, $_POST)) {
            $product->CategoryId    = $this->filterInt($_POST['CategoryId']);
            $product->Name          = $this->filterString($_POST['Name']);
            $product->NameAr        = $this->filterString($_POST['NameAr']);
            $product->BarCode       = $this->filterString($_POST['BarCode']);
            $product->Quantity      = $this->filterInt($_POST['Quantity']);
            $product->BuyPrice      = $this->filterFloat($_POST['BuyPrice']);
            $product->SellPrice     = $this->filterFloat($_POST['SellPrice']);
            $product->Unit          = $this->filterInt($_POST['Unit']);

            $category = ProductsCategoriesModel::getByPK($product->CategoryId);
            $uploadErrors = false;

            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                // Check if image exist and remove it
                if ($product->Image !== null && file_exists(CATEGORY_IMAGES_UPLOAD_STORAGE . DS . $product->Image)) {
                    unlink(CATEGORY_IMAGES_UPLOAD_STORAGE . DS . $product->Image);
                    // Add A new image
                    $upload = new FileUpload($_FILES['image'], $category);
                    try {
                        $upload->upload();
                        $product->Image = $upload->getFileName();
                    } catch (\Exception $e) {
                        $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                        $uploadErrors = true;
                    }
                }
            }
            if ($product->save() && $uploadErrors === false) {
                $this->messenger->add($this->language->get("text_save_modifying_success"));
                $this->redirect('/productlist');
            } else {
                $this->messenger->add($this->language->get("text_save_modifying_failed"), Messenger::APP_MESSAGE_ERROR);
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $product = ProductModel::getByPK($id);
        $productCategory = ProductsCategoriesModel::getByPK($product->CategoryId);
        $productCategoryDirName = ucfirst(strtolower($productCategory->Name));

        if ($product === false) {
            $this->redirect("/productlist");
        }

        $this->language->load('productlist.messages');

        if ($product->delete()) {
            if ($product->Image !== null && file_exists(CATEGORY_IMAGES_UPLOAD_STORAGE . DS . $productCategoryDirName . DS . $product->Image)) {
                unlink(CATEGORY_IMAGES_UPLOAD_STORAGE . DS . $productCategoryDirName . DS . $product->Image);
            }
            $this->messenger->add($this->language->get("text_delete_success"), Messenger::APP_MESSAGE_INFO);
        } else {
            $this->messenger->add($this->language->get("text_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }

        $this->redirect("/productlist");
    }
}
