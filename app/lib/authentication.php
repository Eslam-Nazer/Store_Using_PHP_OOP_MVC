<?php

namespace PHPMVC\Lib;

class Authentication
{
    private static $_instance;
    /**
     * @var SessionManager
     */
    private $_session;

    private $_execludedRoutes = [
        '/index/default',
        '/auth/logout',
        '/users/profile',
        '/users/changepassword',
        '/users/settings',
        '/language/default',
        '/test/default',
        '/accessdenied/default',
    ];

    private function __construct(SessionManager $session)
    {
        $this->_session = $session;
    }
    private function __clone() {}

    public static function getInstance(SessionManager $session)
    {
        if (self::$_instance === null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }

    public function isAuthorized()
    {
        return isset($this->_session->u);
    }

    public function hasAccess($controller, $action)
    {
        $url = '/' . $controller . '/' . $action;
        if (in_array($url, $this->_execludedRoutes) || in_array($url, $this->_session->u->privileges)) {
            return true;
        }
    }
}
