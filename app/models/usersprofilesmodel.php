<?php

namespace PHPMVC\Models;

class UsersProfilesModel extends AbstractModel
{
    private $UserId;
    private $FirstName;
    private $LastName;
    private $Address;
    private $DateOfBirth;
    private $Image;

    protected static $tableName = 'app_users_profiles';
    protected static $tableSchema = [
        'UserId'        => self::DATA_TYPE_INT,
        'FirstName'     => self::DATA_TYPE_STR,
        'LastName'      => self::DATA_TYPE_STR,
        'Address'       => self::DATA_TYPE_STR,
        'DateOfBirth'   => self::DATA_TYPE_DATE,
        'Image'         => self::DATA_TYPE_STR
    ];
    protected static $primaryKey = 'UserId';

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
