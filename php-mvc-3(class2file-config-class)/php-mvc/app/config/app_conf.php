<?php
$conf = Config::instance();
$conf->set('base_uri', '');
$conf->set('dev_mode', 1);

echo $conf->get('dev_mode');