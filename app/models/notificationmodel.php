<?php

namespace PHPMVC\Models;

class NotificationModel extends AbstractModel
{
    private $NotificationId;
    private $Title;
    private $Content;
    private $Type;
    private $Created;
    private $UserId;
    private $Seen;

    protected static $tableName = 'app_notifications';
    protected static $primaryKey = 'NotificationId';
    protected static $tableSchema = [
        'NotificationId'    => self::DATA_TYPE_INT,
        'Title'             => self::DATA_TYPE_STR,
        'Content'           => self::DATA_TYPE_STR,
        'Type'              => self::DATA_TYPE_INT,
        'Created'           => self::DATA_TYPE_STR,
        'UserId'            => self::DATA_TYPE_INT,
        'Seen'              => self::DATA_TYPE_INT,
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
