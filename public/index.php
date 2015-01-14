<?php

$config_file = 'main.php';

require_once(dirname( __FILE__ ) . '/environment.php');
require_once($yii);

$config_main = require_once( dirname( __FILE__ ) . $protected . '/config/' . $config_file );
$config_server = require_once( dirname( __FILE__ ) . $protected . '/config/environment/' . $environment . '.php' );

$config = CMap::mergeArray($config_main, $config_server);

Yii::createWebApplication($config)->run();
