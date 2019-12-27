<?php
return [
    'id' => 'app-frontend-tests',

    // i18N
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',

    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
    ],
];
