<?php
define('MCPROJECT', 'TEST');

require 'application/lib/Dev.php';

use application\core\Router;
//sosat
spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$router = new Router;
$router->run();