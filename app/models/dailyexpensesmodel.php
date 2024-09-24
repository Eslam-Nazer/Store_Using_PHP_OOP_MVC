<?php

namespace PHPMVC\Models;

use ReturnTypeWillChange;

class DailyExpensesModel extends AbstractModel
{
    private $DExpensesId;
    private $ExpenseId;
    private $Payment;
    private $Created;
    private $UserId;

    protected static $tableName     = "app_expenses_daily_list";
    protected static $primaryKey    = "DExpensesId";
    protected static $tableSchema   = [
        "DExpensesId"       => self::DATA_TYPE_INT,
        "ExpenseId"         => self::DATA_TYPE_INT,
        "Payment"           => self::DATA_TYPE_STR,
        "Created"           => self::DATA_TYPE_STR,
        "UserId"            => self::DATA_TYPE_INT
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

    public static function getAll()
    {
        $sql  = 'SELECT aedl.*, au.Username UsernameCreator , aec.ExpenseName, aec.ExpenseNameAr FROM ' . static::getModelTableName() . ' aedl ';
        $sql .= 'INNER JOIN app_users au ON aedl.UserId = au.UserId ';
        $sql .= 'INNER JOIN app_expenses_categories aec ON aec.ExpenseId = aedl.ExpenseId';
        return self::get($sql);
    }
}
