<?php

namespace App\Controller;


use Core\Controller\BaseController;

class AuthenticationController extends BaseController
{
    public function login() {
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = $_POST['email'];
                echo json_encode($email);
                exit();
            }
        }
        $this->renderClassicView('authentication/login', compact('email'), 'login');
    }

    public function signin() {
        $this->renderClassicView('authentication/signin');
    }
}