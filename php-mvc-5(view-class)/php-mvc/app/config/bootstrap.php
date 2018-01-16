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
$route->getRoute($_SERVER['REQUEST_URI']);
$view = new View();
$view->set(array('var1'=>'value1', 'var2'=>'value2'));
$view->set(array('var3'=>'value3', 'var4'=>'value4'));
$view->set(array('var5'=>'value5', 'var6'=>'value6'));
$view->set('var','value');
$view->my_var = 'my_value';
var_dump($view->_vars);