<?php

namespace PHPMVC\Models;

class PurchasesInvoicesModel extends AbstractModel
{
    private $InvoiceId;
    private $SupplierId;
    private $PaymentType;
    private $PaymentStatus;
    private $Created;
    private $Discount;
    private $UserId;

    protected static $tableName     = "app_purchases_invoices";
    protected static $primaryKey    = "InvoiceId";
    protected static $tableSchema   = [
        "InvoiceId"     => self::DATA_TYPE_INT,
        "SupplierId"    => self::DATA_TYPE_INT,
        "PaymentType"   => self::DATA_TYPE_INT,
        "PaymentStatus" => self::DATA_TYPE_INT,
        "Created"       => self::DATA_TYPE_STR,
        "Discount"      => self::DATA_TYPE_DECIMAL,
        "UserId"        => self::DATA_TYPE_INT,
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
