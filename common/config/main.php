<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'servers' => array( array('host' => '127.0.0.1', 'port' => 11211)),
            'keyPrefix' => ''
        ],
    ],
];
