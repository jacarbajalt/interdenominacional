<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        
        'assetManager' => [
            'bundles' => [
                'hail812\adminlte3\assets\AdminLte3Asset' => [
                    'sourcePath' => '@vendor/hail812/yii2-adminlte3/dist',
                    // Otras configuraciones si las hubiera...
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => ['@web/css/bootstrap.min.css'],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => ['@web/js/bootstrap.min.js'],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
                ],
            ],
            
            'class' => 'yii\web\View',
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    //'cachePath' => '@runtime/Smarty/cache',
                ],
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array de opciones de Twig:
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => ['html' => '\yii\helpers\Html'],
                    'uses' => ['yii\bootstrap'],
                ],
                 'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
             ],
         ],
                
                
            ],
        ],
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'iKs_LycsS7F9SKBl6M1JE-EcGps3Unjc',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'], // Establecer la página de inicio de sesión
        ],
         // Otros componentes aquí...
  
    
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],


        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
   'useFileTransport' => false,
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
   'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'sistemagetsemani2024@gmail.com',
            'password' => 'sistema.2024@',
            'port' => '587',
            'encryption' => 'tls',
        ],
    ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'formatter' => [
        
            'dateFormat' => 'php:d-m-Y', // Date format for Mexico (day-month-year)
                               
            'datetimeFormat' => 'php:d-m-Y H:i:s', // Datetime format for Mexico (day-month-year hour:minute:second)
                        
            'timeFormat' => 'php:H:i:s', // Time format for Mexico (hour:minute:second)
           
                        
            'timeZone' => 'America/Mexico_City', // Set timezone to Mexico City
                    ],
                  
            
                  
        'db' => $db,
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                // Reglas de enrutamiento personalizadas aquí
            ],
        ],
    ],
   
        // Otros componentes aquí...
    
        'as beforeRequest' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login'], // Permitir acceso a la acción de inicio de sesión
                ],
                [
                    'allow' => true,
                    'roles' => ['@'], // Requerir autenticación para todas las demás acciones
                ],
                [
                    'allow' => true,
                    'controllers' => ['bautizo'], // Permitir acceso al controlador de bautizo
                    'roles' => ['@'], // Requerir autenticación para el controlador de bautizo
                ],
            ],
        ],
        'layout' => 'main',
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;