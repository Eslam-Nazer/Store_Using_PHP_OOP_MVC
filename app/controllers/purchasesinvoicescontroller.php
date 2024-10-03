<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\ProductModel;
use PHPMVC\Models\PurchasesInvoicesDetailsModel;
use PHPMVC\Models\PurchasesInvoicesModel;
use PHPMVC\Models\PurchasesInvoicesPaymentTypeModel as PaymentType;
use PHPMVC\Models\PurchasesInvoicesReceiptsModel;
use PHPMVC\Models\SuppliersModel;

class PurchasesInvoicesController extends AbstractController
{
    use Validate, Helper, InputFilter;

    public function defaultAction()
    {

        $this->language->load("purchases.default");

        $this->_data["purchases"] = PurchasesInvoicesModel::getAllPurchases();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("purchases.create");
        $this->language->load("purchases.labels");
        $this->language->load("purchases.messages");

        $this->_data["suppliers"] = SuppliersModel::getAll();
        $this->_data["paymenttypes"] = PaymentType::getAll();
        $this->_data["products"] = ProductModel::getAll();

        if (isset($_POST["submit"])) {
            $productId = $this->filterInt($_POST["Product"]);
            if (empty($productId)) {
                $this->messenger->add($this->language->get("text_message_product_not_found"), Messenger::APP_MESSAGE_ERROR);
            }
            $purchasesInvoice = new PurchasesInvoicesModel();
            $purchasesInvoice->SupplierId       = $this->filterInt($_POST["Supplier"]);
            $purchasesInvoice->PaymentTypeId    = $this->filterInt($_POST["PaymentType"]);
            $purchasesInvoice->PaymentStatus    = $this->filterInt($_POST["PaymentStatus"]);
            $purchasesInvoice->Created          = date("Y-m-d H:i:s");
            $purchasesInvoice->Discount         = $this->filterFloat($_POST["Discount"]);
            $purchasesInvoice->UserId           = $this->filterInt($this->session->u->UserId);
            if ($purchasesInvoice->save()) {
                $product = ProductModel::getByPK($productId);
                $invoicesDetails = new PurchasesInvoicesDetailsModel();
                $invoicesDetails->ProductId = $this->filterInt($product->ProductId);
                $invoicesDetails->InvoiceId = $this->filterInt($purchasesInvoice->InvoiceId);
                $invoicesDetails->Quantity  = $product->Quantity;
                if ($purchasesInvoice->Discount > 0) {
                    $invoicesDetails->ProductPrice = $product->BuyPrice - ($product->BuyPrice * $purchasesInvoice->Discount);
                } else {
                    $invoicesDetails->ProductPrice = $product->BuyPrice;
                }
                if ($invoicesDetails->save(false)) {
                    $receipt = new PurchasesInvoicesReceiptsModel();
                    $receipt->InvoiceId = $purchasesInvoice->InvoiceId;
                    $receipt->PaymentTypeId = $purchasesInvoice->PaymentTypeId;
                    $receipt->PaymentAmount = ($product->Quantity * $invoicesDetails->ProductPrice);
                    $receipt->PaymentLiteral = "";
                    $receipt->Created = date("Y-m-d H:i:s");
                    $receipt->UserId = $this->filterInt($this->session->u->UserId);
                    if ($receipt->save()) {
                        $this->messenger->add($this->language->get("text_message_save"));
                        $this->redirect("/purchasesinvoices");
                    } else {
                        $this->messenger->add($this->language->get("text_message_error"), Messenger::APP_MESSAGE_ERROR);
                    }
                }
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $purchasesInvoice = PurchasesInvoicesModel::getByPK($id);

        if ($purchasesInvoice == false) {
            $this->redirect("/purchasesinvoices");
        }
        $purchasesInvoiceDetails = PurchasesInvoicesDetailsModel::getBy(["InvoiceId" => $id])[0];
        $receipt = PurchasesInvoicesReceiptsModel::getBy(["InvoiceId" => $id])[0];

        $this->language->load("purchases.edit");
        $this->language->load("purchases.labels");
        $this->language->load("purchases.messages");

        $this->_data["suppliers"] = SuppliersModel::getAll();
        $this->_data["paymenttypes"] = PaymentType::getAll();
        $this->_data["products"] = ProductModel::getAll();
        $this->_data["purchasesInvoice"] = $purchasesInvoice;
        $this->_data["purchasesInvoiceDetails"] = $purchasesInvoiceDetails;

        if (isset($_POST["submit"])) {
            $purchasesInvoice->SupplierId       = $this->filterInt($_POST["Supplier"]);
            $purchasesInvoice->PaymentTypeId    = $this->filterInt($_POST["PaymentType"]);
            $purchasesInvoice->PaymentStatus    = $this->filterInt($_POST["PaymentStatus"]);
            $purchasesInvoice->Created          = date("Y-m-d H:i:s");
            $purchasesInvoice->Discount         = $this->filterFloat($_POST["Discount"]);
            $purchasesInvoice->UserId           = $this->filterInt($this->session->u->UserId);
            if ($purchasesInvoice->save()) {
                $productId = $this->filterInt($_POST["Product"]);
                if (empty($productId)) {
                    $this->messenger->add($this->language->get("text_message_product_not_found"), Messenger::APP_MESSAGE_ERROR);
                }
                $product = ProductModel::getByPK($productId);
                $purchasesInvoiceDetails->ProductId = $this->filterInt($product->ProductId);
                if ($purchasesInvoiceDetails->Quantity != $product->Quantity) {
                    $purchasesInvoiceDetails->Quantity = $product->Quantity;
                }
                if ($purchasesInvoice->Discount > 0) {
                    $purchasesInvoiceDetails->ProductPrice = $product->BuyPrice - ($product->BuyPrice * $purchasesInvoice->Discount);
                } else {
                    $purchasesInvoiceDetails->ProductPrice = $product->BuyPrice;
                }
                if ($purchasesInvoiceDetails->save()) {
                    $receipt->PaymentTypeId = $purchasesInvoice->PaymentTypeId;
                    $receipt->PaymentAmount = ($product->Quantity * $purchasesInvoiceDetails->ProductPrice);
                    $receipt->PaymentLiteral = "";
                    $receipt->Created = date("Y-m-d H:i:s");
                    $receipt->UserId = $this->filterInt($this->session->u->UserId);
                    if ($receipt->save()) {
                        $this->messenger->add($this->language->get("text_message_edit_success"));
                        $this->redirect("/purchasesinvoices");
                    } else {
                        $this->messenger->add($this->language->get("text_message_edit_error"), Messenger::APP_MESSAGE_ERROR);
                    }
                }
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $purchasesInvoice = PurchasesInvoicesModel::getByPK($id);

        if ($purchasesInvoice == false) {
            $this->redirect("/purchasesinvoices");
        }
        $this->language->load("purchases.messages");
        $purchasesInvoiceDetails = PurchasesInvoicesDetailsModel::getBy(["InvoiceId" => $id])[0];
        $receipt = PurchasesInvoicesReceiptsModel::getBy(["InvoiceId" => $id])[0];

        if ($receipt->delete()) {
            if ($purchasesInvoiceDetails->delete()) {
                if ($purchasesInvoice->delete()) {
                    $this->messenger->add($this->language->get("text_message_delete_success"), Messenger::APP_MESSAGE_INFO);
                    $this->redirect("/purchasesinvoices");
                } else {
                    $this->messenger->add($this->language->get("text_message_delete_error"), Messenger::APP_MESSAGE_ERROR);
                }
            }
        }
    }
}
