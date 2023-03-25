<?php

namespace App\Controller;


use Core\Controller\BaseController;

class UserController extends BaseController
{
    public function login() {
        $this->renderClassicView('authentication/login');
    }

    public function signin() {
        $this->renderClassicView('authentication/signin');
    }
}