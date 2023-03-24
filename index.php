<?php
require 'vendor/autoload.php';

$page = (isset($_GET['p'])) ? $_GET['p'] : 'home';
$validPage = ['home', 'login', 'signin'];

$template = (in_array($page, $validPage)) ? $page : 'home';
(new \Core\Controller\BaseController())->renderClassicView($template);