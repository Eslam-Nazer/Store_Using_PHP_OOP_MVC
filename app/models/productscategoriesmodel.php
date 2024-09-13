<?php

namespace PHPMVC\Models;

class ProductsCategoriesModel extends AbstractModel
{
    private $CategoryId;
    private $Name;
    private $NameAr;
    private $Image;

    protected static $tableName = "app_products_categories";
    protected static $tableSchema = [
        "CategoryId"    => self::DATA_TYPE_STR,
        "Name"          => self::DATA_TYPE_STR,
        "NameAr"          => self::DATA_TYPE_STR,
        "Image"         => self::DATA_TYPE_STR
    ];
    protected static $primaryKey = "CategoryId";

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
