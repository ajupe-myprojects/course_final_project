<?php

namespace App\Element;

use App\Core\AbstractModel;


class ElementModel extends AbstractModel
{
    public $id;
    public $element_title;
    public $element_author;
    public $element_isbn;
    public $element_genre;
    public $element_description;
    public $element_created_at;
    public $element_changed_at;
    public $element_pic;
    public $user_uid;

}