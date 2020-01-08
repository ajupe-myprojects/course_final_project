<?php

namespace App\Comments;

use App\Core\AbstractModel;
use App\Core\AbstractRepository;

class CommentRepository extends AbstractRepository
{
    public function getTableName()
    {
        return 'comments';
    }

    public function getModelName()
    {
        return 'App\\Comments\\CommentModel';
    }
}