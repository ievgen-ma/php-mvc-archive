<?php
include_once CORE_PATH.DS.'functions.php';
$includePath = array(
    APP_PATH.DS.'classes',
    CORE_PATH.DS.'classes',
    get_include_path()
);

$includePath = implode(PATH_SEPARATOR, $includePath);

set_include_path($includePath);

function __autoload($class){
    $file = className2fileName($class).'.php';
    include_once $file;
}

include_once APP_PATH.DS.'config'.DS.'app_conf.php';
include_once APP_PATH.DS.'config'.DS.'routes.php';

$route = Router::instance();

var_dump($route->getRoute($_SERVER['REQUEST_URI']));

var_dump($route->_routes);
