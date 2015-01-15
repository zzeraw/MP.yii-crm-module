<?php

require_once(dirname(__FILE__) . '/params.php');

return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Yii v 1.1 CRM Module',
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
        'clientScript' => array(
            'coreScriptPosition' => CClientScript::POS_END,
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => 'js/',
                    'js' => array(
                        'jquery-1.11.2.min.js'
                    ),
                ),
                'bootstrap3' => array(
                    'baseUrl' => '',
                    'js' => array(
                        YII_DEBUG ? 'js/bootstrap.js' : 'js/bootstrap.min.js'
                    ),
                    'css' => array(
                        'css/bootstrap.min.css',
                        'css/bootstrap-theme.min.css',
                    ),
                    'depends' => array('jquery'),
                ),
                'custom-js' => array(
                    'baseUrl' => 'js/',
                    'js' => array(
                        YII_DEBUG ? 'main.js' : 'main.min.js'
                    ),
                    'depends' =>array('jquery'),
                ),
                'custom-css' => array(
                    'baseUrl' => 'css/',
                    'css' => array('styles.css?css=1'),
                ),
            ),
        ),

        'user' => array(
            'class' => 'CrmWebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/crm/users/login'),
        ),

        'image'=>array(
            'class' => 'application.extensions.image.CImageComponent',
                'driver' => 'GD',
        ),

		'errorHandler' => array(
			'errorAction' => 'site/error',
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

        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
        ),
	),

    'modules' => array(
        'crm',
    ),

	'params' => $params,
);