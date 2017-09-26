<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'app',
    //设置应用名称
    'name' => $params['appName'],
    // 设置目标语言为中文
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '222222',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
      'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,

        ],
    ],
    'params' => $params,
    'modules' => [
        'dynagrid'=> [
            'class' => '\kartik\dynagrid\Module',
            'defaultTheme' => 'simple-default',
            'cookieSettings' => ['httpOnly'=>true, 'expire'=>time() + 100*24*3600],
            //'defaultPageSize' => 1,
            'minPageSize' => 1,
            'maxPageSize' => 200,
        ],
        'gridview'=> [
            'class'=>'\kartik\grid\Module',
        ],
        'home' => [
            'class' => 'app\modules\home\Module',
        ],
        'right' => [
            'class' => 'app\modules\right\Module',
        ],
        'log' => [
            'class' => 'app\modules\log\Module',
        ],
        'basicinfo' => [
            'class' => 'app\modules\basicinfo\Module',
        ],
        'budget' => [
            'class' => 'app\modules\budget\Module',
        ],
        'analysis' => [
            'class' => 'app\modules\analysis\Module',
        ],
        'laboratory' => [

            'class' => 'app\modules\laboratory\Module',

        ],
        'equipment' => [

            'class' => 'app\modules\equipment\Module',

        ],
        'purchase' => [

            'class' => 'app\modules\purchase\Module',

        ],
    ],
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
