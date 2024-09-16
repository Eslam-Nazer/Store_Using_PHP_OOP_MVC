<?php

namespace PHPMVC\Lib;

use PHPMVC\Models\NotificationModel;

class Notification
{
    const CREATED_NOTIFICATION = 1;
    const UPDATED_NOTIFICATION = 2;
    const DELETED_NOTIFICATION = 3;

    private static $_instance;
    private $_notification;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function addNotification($title, $content, $type, $UserId)
    {
        $storeNotification = new NotificationModel();
        $storeNotification->Title = $title;
        $storeNotification->Content = $content;
        $storeNotification->Type = $type;
        $storeNotification->Created = date("Y-m-d H:i:s");
        $storeNotification->UserId  = $UserId;
        $storeNotification->Seen = 0;
        $storeNotification->save();
    }

    public function getNotifications()
    {
        $this->_notification = NotificationModel::getAll();
        return $this->_notification;
    }

    public function seenChecker()
    {
        foreach ($this->getNotifications() as $notification) {
            if ($notification->Seen == 0 || $notification->Seen == null) {
                return true;
            }
        }
        return false;
    }

    public function seen()
    {
        if ($this->seenChecker()) {
            foreach ($this->getNotifications() as $notification) {
                $setSeen = NotificationModel::getByPK($notification->NotificationId);
                $setSeen->Seen = 1;
                $setSeen->save();
            }
        }
    }
}
