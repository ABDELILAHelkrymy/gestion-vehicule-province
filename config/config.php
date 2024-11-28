<?php

return [
    'database' => [
        'dbname' => 'provlaracheCollect',
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
        "/vehicule/ajouter/document/:id" => "vehicule/ajouterDocument",
        "/vehicule/ajouter/chauffeur/:id" => "vehicule/ajouterChauffeur",
    ],
];
