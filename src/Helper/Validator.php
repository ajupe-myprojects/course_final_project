<?php
//+++++ Behold the mighty VALIDATOR!!! ++++//
namespace App\Helper;


class Validator
{

    private $request;

    private function getFormData()
    {
        if(empty($this->request)){
            $forms = new FormHelper();
            $this->request = $forms->getRequests();
        }
        return $this->request;
    }

    //image stuff

    private function getImageFileName(string $path) : string
    {
        $pos = strrpos($path, '/');
        $name = substr($path, $pos + 1);
        $pos2 = strrpos($name, '.');
        $name = substr($name, 0, $pos2);
        return $name;
    }

    private function saveImages(string $path)
    {
        $name = $this->getImageFileName($path);
        $image = @imagecreatefromjpeg($path);
        $imgl = imagescale($image, 250, 350);
        imagejpeg($imgl, 'img/uploads/large/' . $name . '_l.jpg');
        imagedestroy($imgl);
        $imgs = imagescale($image, 72, 110);
        imagedestroy($imgs);
        imagejpeg($imgs, 'img/uploads/small/' . $name . '_s.jpg');
        imagedestroy($image);
    }

    //end image stuff

    public function checkMail($strg)
    {
        $requests = $this->getFormData();
        if(isset($requests[$strg]) && !empty($requests[$strg]) && preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }
    public function checkText($strg)
    {
        $requests = $this->getFormData();
        if(isset($requests[$strg]) && !empty($requests[$strg]) && preg_match('/^[_A-z0-9,.!?\n\s()ÜÖÄüöäß-]*$/', $requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }

    public function checkOpt($strg)
    {
        $requests = $this->getFormData();
        if(isset($requests[$strg]) && !empty($requests[$strg])){
            return $requests[$strg];
        }else{
            return 'No optional content';
        }
    }

    public function checkISBN($strg)
    {
        $requests = $this->getFormData();
        if(isset($requests[$strg]) && !empty($requests[$strg]) && preg_match('/^[0-9]{3}(-)[0-9]*$/', $requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }

    public function imgCheck($strg)
    {
        if(isset($_FILES[$strg]) && !empty($_FILES[$strg]['name'])){
            //muss noch implementiert werden
            return ['!NO_IMAGE!', '!NO_IMAGE!'];
        }else{
            return ['!NO_IMAGE!', '!NO_IMAGE!'];
        }
    }
}