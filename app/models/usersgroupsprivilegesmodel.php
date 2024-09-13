<?php

namespace PHPMVC\Models;

class UsersGroupsPrivilegesModel extends AbstractModel
{
    private $Id;
    private $GroupId;
    private $PrivilegeId;

    protected static $tableName = 'app_users_groups_privileges';
    protected static $tableSchema = [
        'GroupId'       => self::DATA_TYPE_INT,
        'PrivilegeId'   => self::DATA_TYPE_INT
    ];
    protected static $primaryKey = 'Id';

    public function __construct() {}

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public static function getPrivilegesForGroup($groupId)
    {
        $sql  = 'SELECT augp.*, aup.Privilege FROM ' . self::$tableName . ' augp';
        $sql .= ' INNER JOIN app_users_privileges aup ON aup.PrivilegeId = augp.PrivilegeId';
        $sql .= ' WHERE augp.GroupId = ' . $groupId;
        $privileges = self::get($sql);
        $extractedUrls = [];

        if ($privileges !== null) {
            foreach ($privileges as $privilege) {
                $extractedUrls[] = $privilege->Privilege;
            }
        }
        return $extractedUrls;
    }
}
