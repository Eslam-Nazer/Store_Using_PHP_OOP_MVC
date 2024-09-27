<?php

namespace PHPMVC\Models;

class PurchasesInvoicesReceiptsModel extends AbstractModel
{
    private $ReceiptId;
    private $InvoiceId;
    private $PaymentType;
    private $PaymentAmount;
    private $PaymentLiteral;
    private $BankName;
    private $BankAcountNumber;
    private $CheckNumber;
    private $TransferedTo;
    private $Created;
    private $UserId;

    protected static $tableName     = "app_purchases_invoices_receipts";
    protected static $primaryKey    = "ReceiptId";
    protected static $tableSchema   = [
        "ReceiptId"         => self::DATA_TYPE_INT,
        "InvoiceId"         => self::DATA_TYPE_INT,
        "PaymentType"       => self::DATA_TYPE_INT,
        "PaymentAmount"     => self::DATA_TYPE_DECIMAL,
        "PaymentLiteral"    => self::DATA_TYPE_STR,
        "BankName"          => self::DATA_TYPE_STR,
        "BankAcountNumber"  => self::DATA_TYPE_STR,
        "CheckNumber"       => self::DATA_TYPE_STR,
        "TransferedTo"      => self::DATA_TYPE_STR,
        "Created"           => self::DATA_TYPE_STR,
        "UserId"            => self::DATA_TYPE_INT,
    ];

    public function __construct() {}

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($prop)
    {
        $this->$prop;
    }
}
