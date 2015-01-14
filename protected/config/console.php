<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Yii v 1.1 CRM Module Console App',
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    'timeZone' => 'Europe/Moscow',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.components.*',
        'application.models.*',
        'application.helpers.*',
        'application.behaviors.*',
        'application.vendors.*',
    ),

    // application components
    'components' => array(
    	'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=pozor',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'admin',
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'tablePrefix' => '',
        ),
        'log' => array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);