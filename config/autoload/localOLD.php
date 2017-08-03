<?php
return array(
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
    ),
    "doctrine" => array(
        'connection' => [
            "orm_default" => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                "params" => [
                    'host' => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'root',
                    'dbname'   => 'test',
                    'driverOptions' => array(
                        1002=> 'SET NAMES utf8'),
                ],
            ],
        ],

    ),

);
