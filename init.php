<?php

//use App\Core\Container;

require __DIR__.'/autoload.php';
//session_set_cookie_params(4000);
//if(session_status() === PHP_SESSION_NONE) session_start();

//+++++++++++++++++++ Global Functions +++++++++++++++++++++++//

function e( string $str) : string
{
    $fstrg = htmlentities($str, ENT_QUOTES, 'UTF-8');
    return nl2br($fstrg);
}

//+++++++++++++++++++ Routing Table +++++++++++++++++++++++//

$routes = [
    '/start' => [
        'controller' => 'elementController',
        'method' => 'index'
    ]
];

//Building the container for database access
$container = new App\Core\Container();