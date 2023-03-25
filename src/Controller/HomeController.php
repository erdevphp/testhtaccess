<?php

namespace App\Controller;

use Core\Controller\BaseController;

class HomeController extends BaseController
{

    public function index() {
        $this->renderClassicView('home/home');
    }

    public function about() {
        $this->renderClassicView('home/about');
    }
}