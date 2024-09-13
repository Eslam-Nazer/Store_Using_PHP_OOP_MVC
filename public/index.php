<?php

namespace PHPMVC;

ob_start();

use PHPMVC\Lib\Authentication;
use PHPMVC\LIB\FrontController;
use PHPMVC\Lib\Language;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Registry;
use PHPMVC\Lib\SessionManager;
use PHPMVC\Lib\Template\Template;

if (!defined('DS')) {
    define("DS", DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once '..' . DS . 'app' . DS . 'lib' . DS . 'autoload.php';
require_once ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "database" . DIRECTORY_SEPARATOR . "pdodatabase.php";

$session = new SessionManager();
$session->start();

$template_parts = require_once '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';

if (!isset($session->lang)) {
    $session->lang = APP_DEFAULT_LANGUAGE;
}
$template = new Template($template_parts);
$language = new Language();
$messgenger = Messenger::getInstance($session);
$authentication = Authentication::getInstance($session);

$registry = Registry::getInstance();
$registry->session = $session;
$registry->language = $language;
$registry->messenger = $messgenger;

$front = new FrontController($template, $registry, $authentication);
$front->dispatch();
ob_end_flush();
