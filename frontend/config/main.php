<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'=>[
            'enablePrettyUrl' => false,
            'class' => 'yii\web\UrlManager',
            'hostInfo' => 'http://localhost/advanced/frontend/web',
        ],
        'urlManagerBackend'=>[
            'enablePrettyUrl' => true,
            'class' => 'yii\web\UrlManager',
            'showScriptName'=>false,
            'suffix' => '.php?r=',
            'hostInfo' => 'http://localhost/advanced/backend/web',
            'baseUrl' => 'http://localhost/advanced/backend/web',
        ],
        // 'MyComponent'=> [
        //     'class'=>'frontend\components\MyComponent'
        // ],
        
    ],
    'as beforeRequest'=>[
        'class'=>'frontend\components\CheckIfLoggedIn'
    ],
        
    'params' => $params,
];
