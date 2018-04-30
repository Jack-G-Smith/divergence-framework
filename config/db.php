<?php
return [
    /*
     *	MySQL database configuration
     *
     *		Socket is available instead of host.
     *
     */
    'mysql' => [
        'host'      =>  'localhost',
        'database' =>  'divergence',
        'username' =>  'divergence',
        'password' =>  'abc123',
    ],
    /*
     *	This configuration will be used instead of the default if
     *	the file .dev is detected inside of $_SERVER['DOCUMENT_ROOT']
     *
     *	You may override this behaviour in /config/DB.config.php
     *
     */
    'dev-mysql' => [
        'host'      =>  'localhost',
        'database' =>  'divergence',
        'username' =>  'divergence',
        'password' =>  'abc123',
    ],
    /*
     *	If you plan on working on the framework itself it's a good idea to provide
     *	an empty database for unit testing. We provide a socket based connection to test a socket connection.
     *
     */
    'tests-mysql' => [
        'host'     =>   'localhost',
        'database' =>  'test',
        'username' =>  'travis',
        'password' =>  '',
    ],
    'tests-mysql-socket' => [
        // the first is for travis ci and default-ish linux, the second is for my dev machine using osx.
        // feel free to adjust for yourself but do not commit your preference
        'socket'   => file_exists('/var/run/mysqld/mysqld.sock')?'/var/run/mysqld/mysqld.sock':'/tmp/mysql.sock',
        'database' =>  'test',
        'username' =>  'travis',
        'password' =>  '',
    ]
];
