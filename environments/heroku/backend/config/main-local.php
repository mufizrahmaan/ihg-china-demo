<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'U1tm2ZBtdYglTJPS4dGVp0_W0ngprDC3',
        ]
    ],
];
// configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    /*$config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => [ 

                                '127.0.0.1',

                                '::1',

                                '192.168.1.*',

                                '*.*.*.*',

                                '182.64.168.158' 

                        ]
    ];
    $config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];*/
    $config['modules']['gridview'] = [
        'class' => '\kartik\grid\Module',
    ];
    $config['modules']['datecontrol'] = [
        'class' => '\kartik\datecontrol\Module',
        
    ];
return $config;
