<?php

$host = get_env('db_host');
$username = get_env('db_username');
$password = get_env('db_password');
$database = get_env('db_database');

return [

    'default' => env('DB_CONNECTION', 'pgsql'),

    'connections' => [

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $host,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

    ],

    'migrations' => 'migrations'

];
