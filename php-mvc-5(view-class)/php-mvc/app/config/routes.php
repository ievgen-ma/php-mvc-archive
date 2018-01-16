<?php

$route = Router::instance();

$route->connect('page/(\d*)/(\d*)', 'Pages/index/$1/$2');
$route->connect('admin/new-page', 'Pages/add');
$route->connect('(.+)/(.+)/?(.*)', '$1/$2/$3');

unset($route);