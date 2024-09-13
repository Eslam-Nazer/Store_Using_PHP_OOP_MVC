<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\UserModel;

class AuthController extends AbstractController
{
    use Helper;

    public function loginAction()
    {
        $this->language->load('auth.login');
        $this->_template->swapTemplate([
            'login' => VIEWS_PATH . 'auth' . DS . 'login.view.php'
        ]);

        if (isset($_POST['SginIn'])) {
            $isAuthorized = UserModel::authenticate($_POST['UserName'], $_POST['Password'], $this->session);
            if ($isAuthorized == 2) {
                $this->messenger->add($this->language->get('text_user_disable'), Messenger::APP_MESSAGE_INFO);
            } elseif ($isAuthorized == 1) {
                $this->messenger->add($this->language->get('text_user_welcome'));
                $this->redirect('/');
            } elseif ($isAuthorized == false) {
                $this->messenger->add($this->language->get('text_user_not_found'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function logoutAction()
    {
        // TODO: check the cookie deletion
        $this->session->kill();
        $this->redirect('/auth/login');
    }
}
