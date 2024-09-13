<?php

namespace PHPMVC\Controllers;

class AccessDeniedController extends AbstractController
{
    public function defaultAction()
    {
        $this->_view();
    }
}
