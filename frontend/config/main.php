<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),

    // i18N
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',

    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                // Default
                '/' => 'site/index',
                'message' => 'site/message',

                // News
                'news' => 'news/index',
                'news/<id:[0-9]+>' => 'news/view',

                // Categories
                'category' => 'category/index',
                'category/<id:[0-9]+>' => 'category/view',

                // Tags
                'tag' => 'tag/index',
                'tag/<id:[0-9]+>' => 'tag/view',
            ],
        ],
        'i18n' => [
            'translations' => [
                'frontend' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
                    'class' => 'yii\i18n\DbMessageSource',
//                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en-US',
//                    'fileMap' => [
//                        'frontend' => 'frontend.php',
//                    ],
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@frontend/messages'
                ],

            ],
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
    ],
    'params' => $params,
];
