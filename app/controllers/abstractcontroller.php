<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\FrontController;
use PHPMVC\Lib\Validate;

class AbstractController
{
    use Validate;

    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = [];
    protected $_template;
    protected $_registry;

    public function setRegistry($registry)
    {
        $this->_registry = $registry;
    }

    public function __get($key)
    {
        return $this->_registry->$key;
    }

    public function notFoundAction()
    {
        $this->_view();
    }

    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    public function setAction($action)
    {
        $this->_action = $action;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
    }

    public function getTemplateLanguage()
    {
        return $this->language->load('template.default');
    }

    protected function _view()
    {
        $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';

        if ($this->_action == FrontController::NOT_FOUND_ACTION) {
            $view = VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
        }
        if (!file_exists($view)) {
            $view = VIEWS_PATH . 'notfound' . DS . 'noview.view.php';
        }
        $this->getTemplateLanguage();
        $this->language->getDictionary();
        $this->_data = array_merge($this->_data, $this->language->getDictionary());
        $this->_template->setRegistry($this->_registry);
        $this->_template->setActionViewFile($view);
        $this->_template->setAppData($this->_data);
        $this->_template->renderApp();
    }
}
