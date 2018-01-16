<?php
$includePath = array(
    CORE_PATH.DS.'classes',
    APP_PATH.DS.'classes',
    get_include_path()
);

$includePath = implode(PATH_SEPARATOR, $includePath);

set_include_path($includePath);

function __autoload($class){
    $file = strtolower($class).'.php';
    include_once $file;
}

$conf = new Config();

include_once APP_PATH.DS.'config'.DS.'app_conf.php';