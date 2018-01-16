<?php

$route = Router::instance();

$route->connect('admin', 'Admin/index');
$route->connect('admin/new-page', 'Pages/add');
$route->connect('(.+)/(.+)/?(.*)', '$1/$2/$3');

unset($route);