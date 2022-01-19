<?php

$producao = false;

if(!$producao){

    return [
        'database' => [
            'name' => 'sis_concretus',
            'username' => 'root',
            'password' => '',
            'connection' => 'mysql:host=127.0.0.1',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        ]
    ];

}else{

    return [
        'database' => [
            'name' => 'DBNAME',
            'username' => 'DBUSERNAME',
            'password' => 'DBPASSWORD',
            'connection' => 'mysql:host=DBHOST',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        ]
    ];

}