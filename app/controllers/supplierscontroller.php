<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\SuppliersModel;

class SuppliersController extends AbstractController
{
    use Helper, Validate, InputFilter;

    private $_createActionRoles = [
        'Name'          => 'req|alpha|between(3,40)',
        'NameAr'        => 'req|alpha|between(3,40)',
        'Email'         => 'req|email|max(40)',
        'PhoneNumber'   => 'req|alphanum|max(15)',
        'Address'       => 'req|alphanum|max(50)',
        'AddressAr'     => 'req|alphanum|max(50)',
    ];

    public function defaultAction()
    {
        $this->language->load("suppliers.default");

        $this->_data['suppliers'] = SuppliersModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("suppliers.create");
        $this->language->load("suppliers.labels");
        $this->language->load("suppliers.messages");
        $this->language->load("validation.errors");

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {
            $supplier = new SuppliersModel();
            $supplier->Name         = $this->filterString($_POST['Name']);
            $supplier->NameAr       = $this->filterString($_POST['NameAr']);
            $supplier->Email        = $this->filterString($_POST['Email']);
            $supplier->PhoneNumber  = $this->filterString($_POST['PhoneNumber']);
            $supplier->Address      = $this->filterString($_POST['Address']);
            $supplier->AddressAr    = $this->filterString($_POST['AddressAr']);

            if ($supplier->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/suppliers');
        }

        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $supplier = SuppliersModel::getByPK($id);

        if ($supplier == false) {
            $this->redirect("/suppliers");
        }

        $this->language->load("suppliers.edit");
        $this->language->load("suppliers.labels");
        $this->language->load("validation.errors");
        $this->language->load("suppliers.messages");

        $this->_data['supplier'] = $supplier;

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {
            $supplier->Name = $this->filterString($_POST['Name']);
            $supplier->NameAr = $this->filterString($_POST['NameAr']);
            $supplier->Email = $this->filterString($_POST['Email']);
            $supplier->Address = $this->filterString($_POST['Address']);
            $supplier->AddressAr = $this->filterString($_POST['AddressAr']);

            if ($supplier->save()) {
                $this->messenger->add($this->language->get("message_edit_success"));
            } else {
                $this->messenger->add($this->language->get("message_edit_error"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/suppliers");
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $supplier = SuppliersModel::getByPK($id);

        if ($supplier == false) {
            $this->redirect("/suppliers");
        }

        $this->language->load("suppliers.messages");

        if ($supplier->delete()) {
            $this->messenger->add($this->language->get("message_delete_success"), Messenger::APP_MESSAGE_INFO);
        } else {
            $this->messenger->add($this->language->get("message_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }

        $this->redirect("/suppliers");
    }
}
