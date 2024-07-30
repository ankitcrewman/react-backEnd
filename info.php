<?php

phpinfo();

// config/database.php

return [

    // ...

    'connections' => [

        // Other database connections...

        'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('DB_HOST', '127.0.0.1'),
            'port'     => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE', 'homestead'),
            'username' => env('DB_USERNAME', 'homestead'),
            'password' => env('DB_PASSWORD', 'secret'),
            'options'  => [
                'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
            ],
        ],

    ],

    // ...

    'migrations' => 'migrations',

    // ...

];

mongodb://localhost:27017/