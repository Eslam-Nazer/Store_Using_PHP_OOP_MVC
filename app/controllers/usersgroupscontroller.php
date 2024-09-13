<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class UsersGroupsController extends AbstractController
{

    use InputFilter, Helper;

    public function defaultAction()
    {
        $this->language->load('usersgroups.default');
        $this->language->load('usersgroups.messages');
        $this->_data['groups'] = UsersGroupsModel::getAll();
        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('usersgroups.create');
        $this->language->load('usersgroups.labels');
        $this->language->load('usersgroups.messages');

        $this->_data['privileges'] = PrivilegesModel::getAll();

        if (isset($_POST['submit']) && isset($_POST['Privileges']) && !is_null($_POST['Privileges']) && !is_null($_POST['GroupName'])) {
            $group = new UsersGroupsModel();
            $group->GroupName = $this->filterString($_POST['GroupName']);
            $group->GroupNameAr = $this->filterString($_POST['GroupNameAr']);
            if ($group->save()) {
                if (isset($_POST['Privileges']) && is_array($_POST['Privileges'])) {
                    foreach ($_POST['Privileges'] as $privilegeId) {
                        $groupPrivilege = new UsersGroupsPrivilegesModel();
                        $groupPrivilege->GroupId = $group->GroupId;
                        $groupPrivilege->PrivilegeId = $privilegeId;
                        $groupPrivilege->save();
                    }
                }
                $this->messenger->add($this->language->get('text_message_group_success'));
                $this->redirect('/usersgroups');
            } else {
                $this->messenger->add($this->language->get('text_message_group_error'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $group = UsersGroupsModel::getByPK($id);

        if (false === $group) {
            $this->redirect('/usersgroups');
        }


        $this->language->load('usersgroups.edit');
        $this->language->load('usersgroups.labels');
        $this->language->load('usersgroups.messages');

        $this->_data['group'] = $group;
        $this->_data['privileges'] = PrivilegesModel::getAll();

        $groupPrivileges = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);
        $extractedPrivilegesIds = [];
        if (false !== $groupPrivileges) {
            foreach ($groupPrivileges as $privilege) {
                $extractedPrivilegesIds[] = $privilege->PrivilegeId;
            }
        }
        $this->_data['groupPrivileges'] = $extractedPrivilegesIds;

        if (isset($_POST['submit'])) {
            $group->GroupName = $this->filterString($_POST['GroupName']);
            $group->GroupNameAr = $this->filterString($_POST['GroupNameAr']);

            if ($group->save()) {
                if (isset($_POST['Privileges']) && is_array($_POST['Privileges'])) {
                    $privilegeIdsToBeDeleted = array_diff($extractedPrivilegesIds, $_POST['Privileges']);
                    $privilegeIdsToBeAdded = array_diff($_POST['Privileges'], $extractedPrivilegesIds);
                    // Delete the unwanted privileges
                    foreach ($privilegeIdsToBeDeleted as $deletedPrivilege) {
                        $unwantedPrivilege = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $deletedPrivilege, 'GroupId' => $group->GroupId]);
                        current($unwantedPrivilege)->delete();
                    }
                    // Add the wanted Privileges
                    foreach ($privilegeIdsToBeAdded as $privilegeId) {
                        $groupPrivilege = new UsersGroupsPrivilegesModel();
                        $groupPrivilege->GroupId = $group->GroupId;
                        $groupPrivilege->PrivilegeId = $privilegeId;
                        $groupPrivilege->save();
                    }
                }
                $this->redirect('/usersgroups');
                $this->messenger->add($this->language->get('text_message_group_edit_success'));
            } else {
                $this->messenger->add($this->language->get('text_message_group_edit_error'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $this->language->load('usersgroups.messages');

        $id = $this->filterInt($this->_params[0]);
        $group = UsersGroupsModel::getByPK($id);
        if (false == $group) {
            $this->redirect('/usersgroups');
        }
        $groupPrivileges = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);

        if (false != $groupPrivileges) {
            foreach ($groupPrivileges as $groupPrivilege) {
                $groupPrivilege->delete();
            }
        }
        if ($group->delete()) {
            $this->messenger->add($this->language->get('text_message_group_delete_success'), Messenger::APP_MESSAGE_INFO);
            $this->redirect('/usersgroups');
        } else {
            $this->messenger->add($this->language->get('text_message_group_delete_error'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
