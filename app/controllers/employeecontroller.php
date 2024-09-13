<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {
//        TODO: language function
        $this->_language->load('employee.default');
        $this->_data['employees'] = EmployeeModel::getAll();
        $this->_view();
    }
    public function addAction()
    {
        if(isset($_POST['submit'])) {
            var_dump($_POST);
            $name           = $this->filterString($_POST['name']);
            $age            = $this->filterInt($_POST['age']);
            $address        = $this->filterString($_POST['address']);
            $salary         = $this->filterFloat($_POST['salary']);
            $tax            = $this->filterFloat($_POST['tax']);
            $gender         = $this->filterString($_POST['gender']);
            $type_of_work   = $this->filterString($_POST['type_of_work']);
            $windows        = $this->filterInt($_POST['windows']);
            $linux          = $this->filterInt($_POST['linux']);
            $mac            = $this->filterInt($_POST['mac']);
            $notes          = $this->filterString($_POST['notes']);
            $emp = new EmployeeModel($name, $age, $address, $salary, $tax, $gender, $type_of_work, $windows, $linux, $mac, $notes);
            if($emp->save()) {
                $_SESSION['message'] = "{$name} added successfully in database with ID: {$emp->id}";
                $this->redirect("/employee");
            }
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = isset($this->_params[0]) ? $this->filterInt($this->_params[0]): $this->redirect("/employee");
        $emp = EmployeeModel::getByPK($id);
//         var_dump($emp);
        $this->_data['employee'] = $emp ? $emp : $this->redirect("/employee");
        $this->_view();
        if(isset($_POST['submit'])) {
            $name           = trim($this->filterString($_POST['name']));
            $age            = $this->filterInt($_POST['age']);
            $address        = $this->filterString($_POST['address']);
            $salary         = $this->filterFloat($_POST['salary']);
            $tax            = $this->filterFloat($_POST['tax']);
            $gender         = $this->filterString($_POST['gender']);
            $type_of_work   = $this->filterString($_POST['type_of_work']);
            $windows        = $this->filterInt($_POST['windows']);
            $linux          = $this->filterInt($_POST['linux']);
            $mac            = $this->filterInt($_POST['mac']);
            $notes          = $this->filterString($_POST['notes']);

            $newEmp = new EmployeeModel($name, $age, $address, $salary, $tax, $gender, $type_of_work, $windows, $linux, $mac, $notes);
//             var_dump($emp->id);
            $newEmp->id = $emp->id;
//             var_dump($newEmp->save());
            if($newEmp->save()) {
                $_SESSION['message'] = $name . ' employee saved successfully';
                $this->redirect("/employee");
            }
        }
    }
    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeeModel::getByPK($id);
        if($emp === false) {
            $this->redirect("/employee");
        }
        if($emp->delete()) {
            $_SESSION['message'] = "Employee deleted successfully";
            $this->redirect("/employee");
        }

    }
}