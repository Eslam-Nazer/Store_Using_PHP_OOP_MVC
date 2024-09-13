<?php

namespace PHPMVC\Lib\Template;

class Template
{
    use TemplateHelper;

    private $_templateParts;
    private $_action_view;
    private $_data;
    private $_registry;

    public function __construct(array $parts)
    {
        $this->_templateParts = $parts;
    }
    public function setActionViewFile($actionViewPath)
    {
        $this->_action_view = $actionViewPath;
    }
    public function setAppData($data)
    {
        $this->_data = $data;
    }
    public function setRegistry($registry)
    {
        $this->_registry = $registry;
    }
    // TODO: implement a better solution
    public function swapTemplate($template)
    {
        $this->_templateParts['template'] = $template;
    }
    public function __get($key)
    {
        return $this->_registry->$key;
    }
    private function renderTemplateHeaderStart()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }
    private function renderTemplateHeaderEnd()
    {
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }
    private function renderTemplateContentStart()
    {
        require_once TEMPLATE_PATH . 'templatecontentstart.php';
    }
    private function renderTemplateFooter()
    {
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }
    private function renderWrapperStart()
    {
        require_once TEMPLATE_PATH . 'wrapperstart.php';
    }
    private function renderWrapperEnd()
    {
        require_once TEMPLATE_PATH . 'wrapperend.php';
    }
    private function renderTemplateBlocks()
    {
        if (!array_key_exists('template', $this->_templateParts)) {
            trigger_error("Sorry you have define the template blocks", E_USER_WARNING);
        } else {
            extract($this->_data);
            $parts = $this->_templateParts['template'];
            if (!empty($parts)) {
                foreach ($parts as $partKey => $file) {
                    if ($partKey === ':view') {
                        $this->renderWrapperStart();
                        require_once $this->_action_view;
                        $this->renderWrapperEnd();
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }
    private function renderHeaderResources()
    {
        $output = '';
        if (!array_key_exists('header_resources', $this->_templateParts)) {
            trigger_error("Sorry you have define the template header resources", E_USER_WARNING);
        } else {
            $headerResources = $this->_templateParts['header_resources'];
            if (!empty($headerResources)) {
                //                Generate CSS Links
                $css = $headerResources['css'];
                if (!empty($css)) {
                    foreach ($css as $cssKry => $path) {
                        $output .= '<link rel="stylesheet" href="' . $path . '" />';
                    }
                }
                $js = $headerResources['js'];
                if (!empty($js)) {
                    foreach ($js as $jsKey => $path) {
                        $output .= '<script src="' . $path . '"></script>';
                    }
                }
            }
        }
        echo $output;
    }
    private function renderFooterResources()
    {
        $output = '';
        if (!array_key_exists('footer_resources', $this->_templateParts)) {
            trigger_error("Sorry you have define the template header resources", E_USER_WARNING);
        } else {
            $footerResources = $this->_templateParts['footer_resources'];
            if (!empty($footerResources)) {
                $js = $footerResources['js'];
                foreach ($js as $jsKey => $path) {
                    $output .= '<script src="' . $path . '"></script>';
                }
            }
        }
        echo $output;
    }
    public function renderApp()
    {
        $this->renderTemplateHeaderStart();
        //todo: css
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateContentStart();
        $this->renderTemplateBlocks();
        //TODO: js
        $this->renderFooterResources();
        $this->renderTemplateFooter();
    }
}
