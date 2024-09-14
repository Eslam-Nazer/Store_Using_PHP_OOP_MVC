<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\FileUpload;
use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\ProductsCategoriesModel;

class ProductsCategoriesController extends AbstractController
{
    use Helper, InputFilter, Validate;

    private $_createValidationRoles = [
        'Name'      => 'req|alphanum|between(3,30)',
        'NameAr'    => 'req|alphanum|between(3,30)',
    ];

    public function defaultAction()
    {
        $this->language->load("productscategories.default");

        $this->_data["categories"] = ProductsCategoriesModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("productscategories.create");
        $this->language->load("productscategories.labels");
        $this->language->load("productscategories.messages");
        $this->language->load("validation.errors");

        // TODO: explain a better solution to check against file type
        // TODO: explain a better solution to secure the uplaod folder

        $uploadErrors = false;

        if (isset($_POST['submit']) && $this->isValid($this->_createValidationRoles, $_POST)) {
            $category = new ProductsCategoriesModel();
            $category->Name     = $this->filterString($_POST['Name']);
            $category->NameAr   = $this->filterString($_POST['NameAr']);
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $upload = new FileUpload($_FILES['image']);
                try {
                    $upload->upload();
                    $category->Image = $upload->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadErrors = true;
                }
            }
            if ($uploadErrors === false && $category->save()) {
                $this->messenger->add($this->language->get('text_save_success'));
                $this->redirect("/productscategories");
            } else {
                $this->messenger->add($this->language->get('text_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $category = ProductsCategoriesModel::getByPK($id);

        if ($category === false) {
            $this->redirect('/productscategories');
        }

        $this->language->load('productscategories.edit');
        $this->language->load('productscategories.labels');
        $this->language->load("productscategories.messages");
        $this->language->load("validation.errors");

        $this->_data['category'] = $category;
        $this->_data['categorySectionsPath'] = CATEGORY_SECTION_UPLOAD_STORAGE;
        $uploadErrors = false;

        if (isset($_POST['submit']) && $this->isValid($this->_createValidationRoles, $_POST)) {
            $category->Name     = $this->filterString($_POST['Name']);
            $category->NameAr   = $this->filterString($_POST['NameAr']);
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                // Remove Old Image
                if ($category->Image !== null && file_exists(CATEGORY_SECTION_UPLOAD_STORAGE . DS . $category->Image && is_writable(CATEGORY_SECTION_UPLOAD_STORAGE))) {
                    unlink(CATEGORY_SECTION_UPLOAD_STORAGE . DS . $category->Image);
                }
                // Create a new image
                $upload = new FileUpload($_FILES['image']);
                try {
                    $upload->upload();
                    $category->Image = $upload->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadErrors = true;
                }
            }
            if ($uploadErrors === false && $category->save()) {
                $this->messenger->add($this->language->get('text_save_modifying_success'));
                $this->redirect("/productscategories");
            } else {
                $this->messenger->add($this->language->get('text_save_modifying_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id  = $this->filterInt($this->_params[0]);
        $category = ProductsCategoriesModel::getByPK($id);

        if ($category === false) {
            $this->redirect("/productscategories");
        }

        $this->language->load("productscategories.messages");

        if ($category->delete()) {
            if ($category->Image !== null && file_exists(CATEGORY_SECTION_UPLOAD_STORAGE . DS . $category->Image)) {
                unlink(CATEGORY_SECTION_UPLOAD_STORAGE . DS . $category->Image);
            }
            $this->messenger->add($this->language->get("text_delete_success"), Messenger::APP_MESSAGE_INFO);
        } else {
            $this->messenger->add($this->language->get("text_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect("/productscategories");
    }
}
