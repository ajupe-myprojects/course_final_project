<?php

namespace App\Comments;

use App\Core\AbstractModel;


class CommentModel extends AbstractModel
{
    public $cid;
    public $comment_title;
    public $comment_text;
    public $comment_rev_rid;
    public $comment_user_uid;
    public $comment_created_at;
    public $comment_changed_at;
}