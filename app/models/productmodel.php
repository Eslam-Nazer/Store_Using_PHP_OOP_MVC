<?php

namespace PHPMVC\Models;

class ProductModel extends AbstractModel
{
    private $ProductId;
    private $CategoryId;
    private $Name;
    private $NameAr;
    private $Image;
    private $Quantity;
    private $BuyPrice;
    private $SellPrice;
    private $Unit;
    private $BarCode;

    protected static $tableName = "app_products_list";
    protected static $primaryKey = "ProductId";
    protected static $tableSchema = [
        "ProductId"     => self::DATA_TYPE_INT,
        "CategoryId"    => self::DATA_TYPE_INT,
        "Name"          => self::DATA_TYPE_STR,
        "NameAr"        => self::DATA_TYPE_STR,
        "Image"         => self::DATA_TYPE_STR,
        "Quantity"      => self::DATA_TYPE_INT,
        "BuyPrice"      => self::DATA_TYPE_DECIMAL,
        "SellPrice"     => self::DATA_TYPE_DECIMAL,
        "Unit"          => self::DATA_TYPE_INT,
        "BarCode"       => self::DATA_TYPE_STR
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
        $sql  = 'SELECT apl.*, apc.Name CategoryName, apc.NameAr CategoryNameAr FROM ' . self::$tableName . " apl";
        $sql .= ' INNER JOIN ' . ProductsCategoriesModel::getModelTableName() . ' apc';
        $sql .= ' ON apc.CategoryId = apl.CategoryId';
        return self::get($sql);
    }
}
