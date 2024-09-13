<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class PrivilegesController extends AbstractController
{

    use InputFilter, Helper;

    public function defaultAction()
    {
        $this->language->load('privileges.default');
        $this->_data['privileges'] = PrivilegesModel::getAll();
        $this->_view();
    }

    // TODO: We need to implement csrf prevention

    public function createAction()
    {
        $this->language->load('privileges.create');
        $this->language->load('privileges.labels');
        $this->language->load('privileges.messages');
        if (isset($_POST['submit'])) {
            $privilege = new PrivilegesModel;
            $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
            $privilege->PrivilegeTitleAr = $this->filterString($_POST['PrivilegeTitleAr']);
            $privilege->Privilege = $this->filterString($_POST['Privilege']);
            if ($privilege->save()) {
                // TODO : Edit language class
                $this->messenger->add($this->language->get('text_message_save'));
                $this->redirect('/privileges');
            } else {
                $this->messenger->add($this->language->get('text_message_error'), Messenger::APP_MESSAGE_ERROR);
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $privilege = PrivilegesModel::getByPK($id);
        if ($privilege == false) {
            $this->redirect('/privileges');
        }

        $this->_data['privilege'] = $privilege;

        $this->language->load('privileges.edit');
        $this->language->load('privileges.labels');
        $this->language->load('privileges.messages');

        if (isset($_POST['submit'])) {
            $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
            $privilege->PrivilegeTitleAr = $this->filterString($_POST['PrivilegeTitleAr']);
            $privilege->Privilege = $this->filterString($_POST['Privilege']);
            if ($privilege->save()) {
                $this->messenger->add($this->language->get('text_message_edit_success'));
                $this->redirect('/privileges');
            } else {
                $this->messenger->add($this->language->get('text_message_edit_error'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $this->language->load('privileges.messages');
        $id = $this->filterInt($this->_params[0]);
        $privilege = PrivilegesModel::getByPK($id);
        if ($privilege == false) {
            $this->redirect("/privileges");
        }

        $groupPrivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $privilege->PrivilegeId]);
        if (false !== $groupPrivileges) {
            foreach ($groupPrivileges as $groupPrivilege) {
                $groupPrivilege->delete();
            }
        }

        if ($privilege->delete()) {
            $this->messenger->add($this->language->get('text_message_delete_success'), Messenger::APP_MESSAGE_INFO);
            $this->redirect("/privileges");
        } else {
            $this->messenger->add($this->language->get('text_message_delete_error'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
