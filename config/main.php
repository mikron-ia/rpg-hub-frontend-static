<?php

return [
    'version' => '0.7.0',
    'interface' => [
        'titleSuffix' => 'Epic Information Centre',
        'welcome' => 'Welcome to Epic Information Centre',
        'copyright' => [
            'start' => 2015,
            'end' => date('Y'),
        ],
    ],

    'lang' => 'en',
    'availableTranslations' => ['en','pl'],

    'authentication' => [
        'hub' => [
            'allowedStrategies' => [],
            'settingsByStrategy' => []
        ],
        /*
         * This describes list of authentication ways, along with their class suffixes
         *
         * THIS PART SHOULD NOT BE CHANGED BY OTHER CONFIG FILES
         */
        'authenticationMethodReference' => [
            'auth-simple' => 'simple',
            'simple' => 'simple',
        ],
    ],

    'dataSource' => [
        'uri' => '',
        'authStrategy' => '',
    ]
];
