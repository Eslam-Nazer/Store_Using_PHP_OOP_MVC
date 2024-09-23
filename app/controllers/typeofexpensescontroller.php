<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\TypeOfExpensesModel;

use function PHPSTORM_META\type;

class TypeOfExpensesController extends AbstractController
{
    use InputFilter, Validate, Helper;
    private $_createActionRoles = [
        "ExpenseName"       => "req|alphanum",
        "ExpenseNameAr"     => "req|alphanum",
        "FixedPayment"      => "req|num",
    ];

    public function defaultAction()
    {
        $this->language->load("typeofexpenses.default");

        $this->_data["epensestypes"] = TypeOfExpensesModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("typeofexpenses.create");
        $this->language->load("typeofexpenses.labels");
        $this->language->load("typeofexpenses.messages");
        $this->language->load("validation.errors");

        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            $typeOfExpenses = new TypeOfExpensesModel;
            $typeOfExpenses->ExpenseName = $this->filterString($_POST["ExpenseName"]);
            $typeOfExpenses->ExpenseNameAr = $this->filterString($_POST["ExpenseNameAr"]);
            $typeOfExpenses->FixedPayment = $this->filterFloat($_POST["FixedPayment"]);

            if ($typeOfExpenses->save()) {
                $this->messenger->add($this->language->get('text_message_save'));
                $this->redirect("/typeofexpenses");
            } else {
                $this->messenger->add($this->language->get("text_message_error", Messenger::APP_MESSAGE_ERROR));
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $typeOfExpense = TypeOfExpensesModel::getByPK($id);

        if ($typeOfExpense == false) {
            $this->redirect("/typeofexpenses");
        }

        $this->language->load("typeofexpenses.edit");
        $this->language->load("typeofexpenses.labels");
        $this->language->load("typeofexpenses.messages");
        $this->language->load("validation.errors");

        $this->_data["typeOfExpense"] = $typeOfExpense;

        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            $typeOfExpense->ExpenseName     = $this->filterString($_POST["ExpenseName"]);
            $typeOfExpense->ExpenseNameAr   = $this->filterString($_POST["ExpenseNameAr"]);
            $typeOfExpense->FixedPayment    = $this->filterFloat($_POST["FixedPayment"]);

            // var_dump($_POST);
            if ($typeOfExpense->save()) {
                $this->messenger->add($this->language->get("text_message_edit_success"));
                $this->redirect('/typeofexpenses');
            } else {
                $this->messenger->add($this->language->get("text_message_edit_error", Messenger::APP_MESSAGE_ERROR));
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $typeOfExpense = TypeOfExpensesModel::getByPK($id);

        if ($typeOfExpense == false) {
            $this->redirect("/typeofexpenses");
        }

        $this->language->load("typeofexpenses.messages");

        if ($typeOfExpense->delete()) {
            $this->messenger->add($this->language->get("text_message_delete_success"), Messenger::APP_MESSAGE_INFO);
            $this->redirect("/typeofexpenses");
        } else {
            $this->messenger->add($this->language->get("text_message_delete_error"), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
