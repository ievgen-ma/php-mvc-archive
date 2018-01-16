<?php

$route = Router::instance();

$route->connect('page/(\d*)/(\d*)', 'Pages_AdminFirst/index/$1/$2');
$route->connect('(.+)/(.+)/?(.*)', '$1/$2/$3');

unset($route);