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

function fixDate($string)
{
    $timestamp = strtotime($string);
    return date('d-m-Y', $timestamp);
}

function getImageFileName(string $path) : string
{
    $pos = strrpos($path, '/');
    $name = substr($path, $pos + 1);
    $pos2 = strrpos($name, '.');
    $name = substr($name, 0, $pos2);
    return $name;
}

function saveImages(string $path)
{
    $name = getImageFileName($path);
    $image = @imagecreatefromjpeg($path);
    $imgl = imagescale($image, 250, 350);
    imagejpeg($imgl, 'img/uploads/large/' . $name . '_l.jpg');
    imagedestroy($imgl);
    $imgs = imagescale($image, 72, 110);
    imagedestroy($imgs);
    imagejpeg($imgs, 'img/uploads/small/' . $name . '_s.jpg');
    imagedestroy($image);
}

//+++++++++++++++++++ Routing Table +++++++++++++++++++++++//

$routes = [
    '/start' => [
        'controller' => 'elementController',
        'method' => 'index'
    ],
    '/book-single' => [
        'controller' => 'elementController',
        'method' => 'fetchBook'
    ]
];

//Building the container for database access
$container = new App\Core\Container();