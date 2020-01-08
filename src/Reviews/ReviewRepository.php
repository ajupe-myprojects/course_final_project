<?php

namespace App\Reviews;

use App\Core\AbstractRepository;

class ReviewRepository extends AbstractRepository
{
    public function getTableName()
    {
        return 'reviews';
    }

    public function getModelName()
    {
        return 'App\\Reviews\\ReviewModel';
    }

    
}