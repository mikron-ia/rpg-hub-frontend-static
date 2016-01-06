<?php

return [
    'authentication' => [
        'hub' => [
            'allowedStrategies' => ['simple'],
            'settingsByStrategy' => [
                'simple' => [
                    'authenticationKey' => '[enter key]'
                ]
            ]
        ],
    ],
    'dataSource' => [
        'uri' => '',
        'authStrategy' => 'simple',
        'queryUri' => false, /* Use query-based URI (`key=value`); default is segment based (`/key/value/`) */
    ],
    'debug' => false,
    'interface' => [],
    'lang' => 'en',
    'layout' => 'default',
];
