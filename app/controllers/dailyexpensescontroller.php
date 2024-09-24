<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\TypeOfExpensesModel;

class DailyExpensesController extends AbstractController
{
    use Validate, Helper, InputFilter;

    private $_createValidationRules = [
        "DailyExpense"      => "req|int"
    ];

    public function defaultAction()
    {
        $this->language->load("dailyexpenses.default");

        $this->_data["dailyExpenses"] = DailyExpensesModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("dailyexpenses.create");
        $this->language->load("dailyexpenses.labels");
        $this->language->load("dailyexpenses.messages");
        $this->language->load("Validation.errors");

        $expenses = TypeOfExpensesModel::getAll();
        $this->_data['expenses'] = $expenses;

        if (isset($_POST["submit"]) && $this->isValid($this->_createValidationRules, $_POST)) {
            $dailyExpense = new DailyExpensesModel();
            $dailyExpense->ExpenseId = $this->filterInt($_POST["DailyExpense"]);
            $dailyExpense->Payment = (TypeOfExpensesModel::getByPK($dailyExpense->ExpenseId))->FixedPayment;
            $dailyExpense->Created = date("Y-m-d H:i:s");
            $dailyExpense->UserId = $this->filterInt($this->session->u->UserId);
            if ($dailyExpense->save()) {
                $this->messenger->add($this->language->get("text_message_save"));
                $this->redirect("/dailyexpenses");
            } else {
                $this->messenger->add($this->language->get("text_message_error"), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $dailyexpense = DailyExpensesModel::getByPK($id);

        if ($dailyexpense == false) {
            $this->redirect("/dailyexpenses");
        }

        $this->language->load("dailyexpenses.edit");
        $this->language->load("dailyexpenses.labels");
        $this->language->load("dailyexpenses.messages");
        $this->language->load("Validation.errors");

        $expenses = TypeOfExpensesModel::getAll();
        $this->_data['expenses'] = $expenses;
        $this->_data["dailyexpense"] = $dailyexpense;

        if (isset($_POST["submit"]) && $this->isValid($this->_createValidationRules, $_POST)) {
            $dailyexpense->ExpenseId = $this->filterInt($_POST["DailyExpense"]);
            $dailyexpense->Payment   = (TypeOfExpensesModel::getByPK($dailyexpense->ExpenseId))->FixedPayment;
            $dailyexpense->Created   = date("Y-m-d H:i:s");
            $dailyexpense->UserId    = $this->filterInt($this->session->u->UserId);
            if ($dailyexpense->save()) {
                $this->messenger->add($this->language->get("text_message_edit_success"));
                $this->redirect("/dailyexpenses");
            } else {
                $this->messenger->add($this->language->get("text_message_edit_error"), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $dailyExpense = DailyExpensesModel::getByPK($id);

        if ($dailyExpense == false) {
            $this->redirect("/dailyexpenses");
        }

        $this->language->load("dailyexpenses.messages");

        if ($dailyExpense->delete()) {
            $this->messenger->add($this->language->get("text_message_delete_success"), Messenger::APP_MESSAGE_INFO);
            $this->redirect("/dailyexpenses");
        } else {
            $this->messenger->add($this->language->get("text_message_delete_error"), Messenger::APP_MESSAGE_WARING);
        }
    }
}
