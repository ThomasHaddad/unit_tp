<?php

return [
    'default'=>'mysql',
    'connections'=>[
        'host'=>getenv('DB_HOST'),
        'database'  => getenv('DB_NAME'),
        'username'  => getenv('DB_USERNAME'),
        'password'  => getenv('DB_PASSWORD'),
]

];