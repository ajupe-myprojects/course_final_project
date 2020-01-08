<?php

namespace App\Core;

abstract class AbstractController
{
    //linking to the page for the output of the gathered data
    protected function render($view, $params)
    {
        extract($params);
        include __DIR__."./../../views/{$view}.php";
    }
}