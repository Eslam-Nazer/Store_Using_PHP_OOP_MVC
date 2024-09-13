<?php

namespace PHPMVC\Models;

use PHPMVC\Lib\SessionManager;

class UserModel extends AbstractModel
{
    private $UserId;
    private $Username;
    private $Password;
    private $Email;
    private $PhoneNumber;
    private $SubscriptionDate;
    private $LastLogin;
    private $GroupId;
    private $Status;

    /**
     * @var UsersProfilesModel
     */
    private $profile;

    protected static $tableName = 'app_users';
    protected static $tableSchema = array(
        'UserId'            => self::DATA_TYPE_INT,
        'Username'          => self::DATA_TYPE_STR,
        'Password'          => self::DATA_TYPE_STR,
        'Email'             => self::DATA_TYPE_STR,
        'PhoneNumber'       => self::DATA_TYPE_STR,
        'SubscriptionDate'  => self::DATA_TYPE_DATE,
        'LastLogin'         => self::DATA_TYPE_STR,
        'GroupId'           => self::DATA_TYPE_INT,
        'Status'            => self::DATA_TYPE_BOOL
    );
    protected static $primaryKey = 'UserId';


    public function __construct() {}

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function cryptPassword($password)
    {
        $this->Password = crypt($password, APP_SALT);
    }

    // TODO: Fix Table Name Alasing
    public static function getUsers(UserModel $user)
    {
        return self::get(
            'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tableName . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId WHERE au.UserId != ' . $user->UserId
        );
    }

    public static function userExists($username)
    {
        $foundedUser = self::get(
            'SELECT * FROM ' . self::$tableName . ' WHERE Username = "' . $username . '"'
        );
        return $foundedUser != false ? true : false;
    }

    public static function authenticate($username, $password, $session)
    {
        $password = crypt($password, APP_SALT);
        $sql = 'SELECT *, (SELECT GroupName from app_users_groups WHERE app_users_groups.GroupId = ' . self::$tableName . '.GroupId) GroupName, (SELECT GroupNameAr from app_users_groups WHERE app_users_groups.GroupId = ' . self::$tableName . '.GroupId) GroupNameAr FROM ' . self::$tableName . ' WHERE Username = "' . $username . '" AND Password = "' . $password . '"';
        $foundUser = self::getOne($sql);

        if (false !== $foundUser) {
            if ($foundUser->Status == 2) {
                return 2;
            }
            $foundUser->LastLogin = date("Y-m-d H:i:s");
            $foundUser->save();
            $foundUser->profile = UsersProfilesModel::getByPK($foundUser->UserId);
            $foundUser->privileges = UsersGroupsPrivilegesModel::getPrivilegesForGroup($foundUser->GroupId);
            $session->u = $foundUser;
            return 1;
        }
        return false;
    }
}
