<?php

namespace PHPMVC\Models;

class UsersGroupsModel extends AbstractModel
{
    private $GroupId;
    private $GroupName;
    private $GroupNameAr;

    protected static $tableName = 'app_users_groups';
    protected static $tableSchema = [
        'GroupId'       => self::DATA_TYPE_INT,
        'GroupName'     => self::DATA_TYPE_STR,
        'GroupNameAr'   => self::DATA_TYPE_STR
    ];
    protected static $primaryKey = "GroupId";

    public function __construct()
    {
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
}
