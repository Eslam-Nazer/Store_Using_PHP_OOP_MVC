<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\ClientsModel;

class ClientsController extends AbstractController
{
    use Helper, Validate, InputFilter;

    private $_createActionRoles = [
        'Name'          => 'req|alpha|between(3,40)',
        'NameAr'        => 'req|alpha|between(3,40)',
        'Email'         => 'req|email|max(40)',
        'PhoneNumber'   => 'req|alphanum|max(15)',
        'Address'       => 'req|alphanum|max(50)',
        'AddressAr'       => 'req|alphanum|max(50)',
    ];

    public function defaultAction()
    {
        $this->language->load("clients.default");

        $this->_data['clients'] = ClientsModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("clients.create");
        $this->language->load("clients.labels");
        $this->language->load("clients.messages");
        $this->language->load("validation.errors");

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {
            $supplier = new ClientsModel();
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
            $this->redirect('/clients');
        }

        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $client = ClientsModel::getByPK($id);

        if ($client == false) {
            $this->redirect("/clients");
        }

        $this->language->load("clients.edit");
        $this->language->load("clients.labels");
        $this->language->load("validation.errors");
        $this->language->load("clients.messages");

        $this->_data['client'] = $client;

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {
            $client->Name = $this->filterString($_POST['Name']);
            $client->NameAr = $this->filterString($_POST['NameAr']);
            $client->Email = $this->filterString($_POST['Email']);
            $client->Address = $this->filterString($_POST['Address']);
            $client->AddressAr = $this->filterString($_POST['AddressAr']);

            if ($client->save()) {
                $this->messenger->add($this->language->get("message_edit_success"));
            } else {
                $this->messenger->add($this->language->get("message_edit_error"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/clients");
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $supplier = ClientsModel::getByPK($id);

        if ($supplier == false) {
            $this->redirect("/clients");
        }

        $this->language->load("clients.messages");

        if ($supplier->delete()) {
            $this->messenger->add($this->language->get("message_delete_success"), Messenger::APP_MESSAGE_INFO);
        } else {
            $this->messenger->add($this->language->get("message_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }

        $this->redirect("/clients");
    }
}
