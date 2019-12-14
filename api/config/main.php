<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),

    // i18N
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',

    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => 'json',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'category',
//                    'pluralize' => false,
//                    'only' => ['index', 'options'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'news',
//                    'only' => ['index', 'options'],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'tag',
                    'only' => ['index', 'options'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
