<?php

use Core\Router\Router;

define('ROOT_PATH',  dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

require 'vendor/autoload.php';

$url = $_GET['p'] ?? ($_GET['p'] = '/home');

$router = new Router($url);

$router->get('/home', 'Home@index');
$router->get('/about', 'Home@about');

$router->get('/login', 'Authentication@login');
$router->post('/login', 'Authentication@login');

$router->get('/signin', 'Authentication@signin');

try {
    $router->run();
} catch (Exception $e) {

}