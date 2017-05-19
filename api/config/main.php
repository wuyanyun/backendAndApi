<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), 
    require(__DIR__ . '/../../common/config/params-local.php'), 
    require(__DIR__ . '/params.php'), 
    require(__DIR__ . '/params-local.php')
);

return [
    'defaultRoute'=>'site',
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
//    'modules' => [
//        "admin" => [
//            "class" => "mdm\admin\Module",
//        ],
//    ],
//    "aliases" => [
//        "@mdm/admin" => "@vendor/mdmsoft/yii2-admin",
//    ],
//    'as access' => [
//        'class' => 'mdm\admin\components\AccessControl',
//        'allowActions' => [
//            //这里是允许访问的action
//            //controller/action
//            // * 表示允许所有，后期会介绍这个
//            'site/*'
//        ]
//    ],
    'components' => [
//        'user' => [
//            'identityClass' => 'backend\models\UserBackend',
//            'enableAutoLogin' => true,
//        ],
//        'request' => [
//            'csrfParam' => '_csrf-backend',
//        ],
          'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
          'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
               'text/json' => 'yii\web\JsonParser',
            ],

        ],
        'response' => [
            'class' => 'yii\web\Response',
             'on beforeSend' => function ($event) {
                  $response = $event->sender;
                  if(!$response->isSuccessful) {
                      $response->statusCode = 200;
                  }
              }
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-api',
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
//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],
       'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '<controller>/<action>'=>'<controller>/<action>',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => ['@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'],
//            ],
//        ],
    ],
    'params' => $params,
];
