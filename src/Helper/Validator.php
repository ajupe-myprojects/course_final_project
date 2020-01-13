<?php
//+++++ Behold the mighty VALIDATOR!!! ++++//
namespace App\Helper;


class Validator
{
    public function checkMail($strg)
    {
        $forms = new FormHelper();
        $requests = $forms->getRequests();
        if(isset($requests[$strg]) && !empty($requests[$strg]) && preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }
    public function checkText($strg)
    {
        $forms = new FormHelper();
        $requests = $forms->getRequests();
        if(isset($requests[$strg]) && !empty($requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }

    public function checkOpt($strg)
    {
        $forms = new FormHelper();
        $requests = $forms->getRequests();
        if(isset($requests[$strg]) && !empty($requests[$strg])){
            return $requests[$strg];
        }else{
            return 'No optional content';
        }
    }
}