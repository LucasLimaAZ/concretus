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
            'name' => 'sis_concretus',
            'username' => 'sis_concretus',
            'password' => 'conc_sis@2020',
            'connection' => 'mysql:host=sis_concretus.mysql.dbaas.com.br',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        ]
    ];

}