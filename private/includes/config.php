<?php

$config = [
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'SpaceX-Project',
    'DB_USER' => 'root',
    'DB_PASSWORD' => '',
    'BASE_URL' => '/project/SpaceX-new/public',
    'ROOT' => dirname(dirname(__DIR__)),
    'PRIVATE' => dirname(__DIR__),
    'WEBROOT' => dirname(dirname(__DIR__)) . '/public'
];

return $config;
