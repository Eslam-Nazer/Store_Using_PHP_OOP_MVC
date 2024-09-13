<?php

namespace PHPMVC\Models;

class SuppliersModel extends AbstractModel
{
    private $SupplierId;
    private $Name;
    private $NameAr;
    private $PhoneNumber;
    private $Email;
    private $Address;
    private $AddressAr;

    protected static $tableName = "app_suppliers";
    protected static $primaryKey = "SupplierId";
    protected static $tableSchema = [
        "SupplierId"    => self::DATA_TYPE_INT,
        "Name"          => self::DATA_TYPE_STR,
        "NameAr"          => self::DATA_TYPE_STR,
        "PhoneNumber"   => self::DATA_TYPE_STR,
        "Email"         => self::DATA_TYPE_STR,
        "Address"       => self::DATA_TYPE_STR,
        "AddressAr"       => self::DATA_TYPE_STR,
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
