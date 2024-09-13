<?php

namespace PHPMVC\Lib\Database;

class PDOabsHandler extends DatabaseHandler
{
    private static $_instance;
    private static $_handler;

    private function __construct()
    {
        self::ini();
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([&self::$_handler, $name], $arguments);
    }
    protected static function ini()
    {
        try {
            self::$_handler = new \PDO('mysql://hostname=' . DATABASE_HOST_NAME . ";dbname=" . DATABASE_DB_NAME, DATABASE_USER_NAME, DATABASE_PASSWORD, [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public static function getInstance()
    {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}