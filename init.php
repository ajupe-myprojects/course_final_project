<?php

//use App\Core\Container;

require __DIR__.'/autoload.php';
//session_set_cookie_params(4000);
if(session_status() === PHP_SESSION_NONE) session_start();

//+++++++++++++++++++ Global Functions +++++++++++++++++++++++//

function e( string $str) : string
{
    $fstrg = htmlentities($str, ENT_QUOTES, 'UTF-8');
    return nl2br($fstrg);
}

function fixDate($string)
{
    $timestamp = strtotime($string);
    return date('d.m.Y', $timestamp);
}


//+++++++++++++++++++ Routing Tables +++++++++++++++++++++++//

$routes = [
    '/start' => [
        'controller' => 'elementController',
        'method' => 'index'
    ],
    '/book-single' => [
        'controller' => 'elementController',
        'method' => 'fetchBook'
    ],
    '/login-user' => [
        'controller' => 'loginController',
        'method' => 'loginUser'
    ],
    '/logout' => [
        'controller' => 'loginController',
        'method' => 'logout'
    ],
    '/make-contact' => [
        'controller' => 'loginController',
        'method' => 'contactMail'
    ],
    '/signup' => [
        'controller' => 'loginController',
        'method' => 'signUpUser'
    ],
    '/add-review' => [
        'controller' => 'elementController',
        'method' => 'addReview'
    ],
    '/add-comment' => [
        'controller' => 'elementController',
        'method' => 'addComment'
    ],
    '/new-book' => [
        'controller' => 'elementController',
        'method' => 'addElement'
    ],
    '/regen-email' => [
        'controller' => 'loginController',
        'method' => 'regeneratePassword'
    ]
];

$links = [
    '/login' => '/views/page_main_login.php',
    '/user-info' => '/views/page_main_user_info.php',
    '/impressum' => '/views/page_main_impressum.php',
    '/daten' => '/views/page_main_daten.php',
    '/contact' => '/views/page_main_contact.php',
    '/signup-error' => '/views/page_main_login_error.php'

];

//Building the container for database access
$container = new App\Core\Container();