<?php

namespace PHPMVC\Models;

class PurchasesInvoicesPaymentTypeModel extends AbstractModel
{
    private $PaymentTypeId;
    private $TypeName;
    private $TypeNameAr;

    protected static $tableName = "app_purchases_invoices_payment_type";
    protected static $primaryKey    = "PaymentTypeId";
    protected static $tableSchema   = [
        "PaymentTypeId"     => self::DATA_TYPE_INT,
        "TypeName"          => self::DATA_TYPE_STR,
        "TypeNameAr"        => self::DATA_TYPE_STR,
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
