<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'yii2-advanced',
        ],
        'frontend-cache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'yii2-advanced-frontend',
            'cachePath' => '@frontend/runtime/cache',
        ],
    ],
];
