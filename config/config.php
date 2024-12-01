<?php

return [
    'database' => [
        'dbname' => 'vhprovgest',
        'user' => 'root',
        'password' => '',
        'connection' => 'mysql:host=localhost:3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'routes' => [
        "/auth/login" => "auth/login",
        "/" => "home/index",
        "/board" => "board/index",
        "/vehicule/ajouter" => "vehicule/ajouter",
        "/vehicule/modifier/:id" => "vehicule/modifier",
    ],
];
