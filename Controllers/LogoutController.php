<?php

class LogoutController extends BaseController
{

    public $cookie;

    public function __construct()
    {
        $this->cookie = new Cookie();
    }

    public function logout()
    {

        session_destroy();
        $this->cookie->delete();

        // setcookie("user_mail", '', 1); // 1/1/1970
        // setcookie("user_mail", '', 1, '/');

        // setcookie("hash", '', 1); // 1/1/1970
        // setcookie("hash", '', 1, '/');
        // }
        header("location: index.php");
        die();
    }
}
