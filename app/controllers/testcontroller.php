<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Validate;
use PHPMVC\Models\UserModel;
use PHPMVC\Models\UsersGroupsModel;

class TestController extends AbstractController
{
    use Validate;
    public function defaultAction()
    {
        function alpha($value)
        {
            return (bool) preg_match('/^[a-zA-Z\p{Arabic}0-9\s ]+$/u', $value);
        }
        // var_dump(UsersGroupsModel::getModelTableName());
        echo '<pre>';
        var_dump(alpha('$^&*((#$%234324'));
        echo '</pre>';
    }
}
