<?php

namespace PHPMVC\Models;

class PurchasesInvoicesDetailsModel extends AbstractModel
{
    private $Id;
    private $ProductId;
    private $InvoiceId;
    private $Quantity;
    private $ProductPrice;

    protected static $tableName     = "app_purchases_invoices_details";
    protected static $primaryKey    = "Id";
    protected static $tableSchema   = [
        "Id"            => self::DATA_TYPE_INT,
        "ProductId"     => self::DATA_TYPE_INT,
        "InvoiceId"     => self::DATA_TYPE_INT,
        "Quantity"      => self::DATA_TYPE_INT,
        "ProductPrice"  => self::DATA_TYPE_DECIMAL,
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
