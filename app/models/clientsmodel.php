<?php

namespace PHPMVC\Models;

class ClientsModel extends AbstractModel
{
    private $ClientId;
    private $Name;
    private $NameAr;
    private $PhoneNumber;
    private $Email;
    private $Address;
    private $AddressAr;

    protected static $tableName = "app_clients";
    protected static $primaryKey = "ClientId";
    protected static $tableSchema = [
        "ClientId"    => self::DATA_TYPE_INT,
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
