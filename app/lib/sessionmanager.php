<?php

namespace PHPMVC\Lib;

class SessionManager extends \SessionHandler
{
    private $sessionName = SESSION_NAME;
    private $sessionMaxLifetime = SESSION_LIFE_TIME;
    private $sessionSSL = false;
    private $sessionHTTPOnly = true;
    private $sessionPath = '/';
    private $sesssionDomain = '.store.com';
    private $sessionSavePath = SESSION_SAVE_PATH;
    private $sessionCipherAlgo = 'AES-128-ECB';
    private $sessionCipherkey = 'WYCRYPT0K3Y@2024';

    private $ttl = 30;

    public function __construct()
    {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', 'files');

        session_name($this->sessionName);
        session_save_path($this->sessionSavePath);
        session_set_cookie_params(
            $this->sessionMaxLifetime,
            $this->sessionPath,
            $this->sesssionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
        // session_set_save_handler($this, true);
        $this->start();
    }

    public function read(string  $id): string
    {
        return openssl_decrypt(base64_decode(parent::read($id)), $this->sessionCipherAlgo, $this->sessionCipherkey);
    }

    public function write(string $id, string $data): bool
    {
        return parent::write($id, base64_encode(openssl_encrypt($data, $this->sessionCipherAlgo, $this->sessionCipherkey)));
    }
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get($name)
    {
        return  false !== $_SESSION[$name] ? $_SESSION[$name] : false;
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }

    public function start()
    {
        if ('' === session_id()) {
            if (session_start()) {
                $this->setStartTime();
                $this->checkSessionValidity();
            }
        }
    }

    private function setStartTime(): int
    {
        if (!isset($this->startTime)) {
            $this->startTime = time();
        }
        return $this->startTime;
    }

    private function checkSessionValidity()
    {
        if ((time() - $this->setStartTime()) > $this->ttl * 60) {
            $this->renewSession();
            $this->generateFingerPrint();
        }
        return true;
    }

    private function renewSession()
    {
        $this->startTime = time();
        session_regenerate_id(true);
    }

    public function kill()
    {
        session_unset();
        setcookie($this->sessionName, '', time() - 1000, $this->sessionPath, $this->sesssionDomain, $this->sessionSSL, $this->sessionHTTPOnly);
        session_destroy();
    }

    private function generateFingerPrint()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $isSecure = false;
        $this->cipherKey = openssl_random_pseudo_bytes(32);
        $sessionId = session_id();
        $this->fingerPrint = md5($userAgent . $this->cipherKey . $sessionId);
    }

    public function isValidFingerPrint()
    {
        if (!isset($this->fingerPrint)) {
            $this->generateFingerPrint();
        }

        $fingerPrint = md5($_SERVER['HTTP_USER_AGENT'] . $this->cipherKey . session_id());

        if ($this->fingerPrint === $fingerPrint) {
            return true;
        }
        return false;
    }

    public function __unset($key)
    {
        unset($_SESSION[$key]);
    }
}
