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

    private function saveImages(string $fname, string $title)
    {
        $name = str_replace(':', '', $title);
        $name = str_replace(' ', '_',$name);
        switch($_FILES[$fname]['type']){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($_FILES[$fname]['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($_FILES[$fname]['tmp_name']);
                break;
        }
        
        $imgl = imagescale($image, 250, 350);
        $path1 = 'img/uploads/large/' . $name . '_l.jpg';
        imagejpeg($imgl, $path1);
        imagedestroy($imgl);
        $imgs = imagescale($image, 72, 110);
        $path2 = 'img/uploads/small/' . $name . '_s.jpg';
        imagejpeg($imgs, $path2);
        imagedestroy($imgs);
        imagedestroy($image);
        return [$path1, $path2];
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
        if(isset($requests[$strg]) && !empty($requests[$strg]) && preg_match('/^[_A-z0-9,.!?:\n\s()ÜÖÄüöäß-]*$/', $requests[$strg])){
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

    public function imgCheck($strg, $title)
    {
        if(isset($_FILES[$strg]) && !empty($_FILES[$strg]['name'])){
            $arr = $this->saveImages($strg, $title);
            return [$arr[0], $arr[1]];
        }else{
            return ['!NO_IMAGE!', '!NO_IMAGE!'];
        }
    }
}