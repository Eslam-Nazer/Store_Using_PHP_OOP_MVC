<?php

namespace PHPMVC\Models;

class PurchasesInvoicesModel extends AbstractModel
{
    private $InvoiceId;
    private $SupplierId;
    private $PaymentTypeId;
    private $PaymentStatus;
    private $Created;
    private $Discount;
    private $UserId;

    protected static $tableName     = "app_purchases_invoices";
    protected static $primaryKey    = "InvoiceId";
    protected static $tableSchema   = [
        "InvoiceId"         => self::DATA_TYPE_INT,
        "SupplierId"        => self::DATA_TYPE_INT,
        "PaymentTypeId"     => self::DATA_TYPE_INT,
        "PaymentStatus"     => self::DATA_TYPE_INT,
        "Created"           => self::DATA_TYPE_STR,
        "Discount"          => self::DATA_TYPE_DECIMAL,
        "UserId"            => self::DATA_TYPE_INT,
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

    public static function getAllPurchases()
    {
        $sql  = "SELECT api.* , as.Name SupplierName, as.NameAr SupplierNameAr, au.Username UserCreator, apipt.*, apir.PaymentAmount FROM " . self::getModelTableName() . " api ";
        $sql .= " INNER JOIN app_suppliers `as` ON as.SupplierId = api.SupplierId ";
        $sql .= " INNER JOIN app_users `au` ON au.UserId = api.UserId ";
        $sql .= " INNER JOIN app_purchases_invoices_payment_type `apipt` ON apipt.PaymentTypeId = api.PaymentTypeId ";
        $sql .= " INNER JOIN app_purchases_invoices_receipts `apir` ON apir.InvoiceId = api.InvoiceId";
        return self::get($sql);
    }
}
