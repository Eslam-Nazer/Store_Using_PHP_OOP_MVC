<?php

namespace PHPMVC\Models;

class PrivilegesModel extends AbstractModel
{

    private $PrivilegeId;
    private $Privilege;
    private $PrivilegeTitle;
    private $PrivilegeTitleAr;

    protected static $tableName = 'app_users_privileges';
    protected static $tableSchema = [
        'PrivilegeId'       => self::DATA_TYPE_INT,
        'Privilege'         => self::DATA_TYPE_STR,
        'PrivilegeTitle'    => self::DATA_TYPE_STR,
        'PrivilegeTitleAr'    => self::DATA_TYPE_STR,
    ];
    protected static $primaryKey = 'PrivilegeId';

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
