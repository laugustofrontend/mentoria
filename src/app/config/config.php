<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 6/4/17
 * Time: 3:23 PM
 */

return [
    'settings' => [
        'displayErrorDetails' => true,
        'view' => [
            'templates' => __DIR__ . '/../templates',
            'cache' => false,
            'debug' => true
        ],
        'sendEmail' => [
            'host' => 'smtp.gmail.com',
            'username' => 'lucas.augusto5061@gmail.com',
            'password' => 'tprplgynqmzisgvk',
            'port' => '587'
        ],
        'db' => [
            'host' => '127.0.0.1',
            'user' => 'mentoria',
            'pass' => 'mentoria',
            'dbname' => 'mentoria'
        ]
    ]
];
