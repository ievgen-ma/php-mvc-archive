<?php
error_reporting(E_ALL);
$conf = Config::instance();
$conf->set('dev_mode', true);
$conf->set('gz_output', true);
$conf->set('default_layout', 'default');
$conf->set('view_ext', '.php');
unset($conf);
