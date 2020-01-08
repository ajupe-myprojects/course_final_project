<?php

namespace App\Reviews;

use App\Core\AbstractModel;


class ReviewModel extends AbstractModel
{
    public $rid;
    public $rev_title;
    public $rev_text;
    public $rev_element_id;
    public $rev_created_at;
    public $rev_changed_at;
    public $rev_user_uid;
}