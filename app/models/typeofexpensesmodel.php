<?php

namespace PHPMVC\Models;

class TypeOfExpensesModel extends AbstractModel
{
    private $ExpenseId;
    private $ExpenseName;
    private $ExpenseNameAr;
    private $FixedPayment;

    protected static $tableName = "app_expenses_categories";
    protected static $primaryKey = "ExpenseId";
    protected static $tableSchema = [
        "ExpenseId"     => self::DATA_TYPE_INT,
        "ExpenseName"   => self::DATA_TYPE_STR,
        "ExpenseNameAr" => self::DATA_TYPE_STR,
        "FixedPayment"  => self::DATA_TYPE_STR,
    ];

    public function __construct() {}

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
}
