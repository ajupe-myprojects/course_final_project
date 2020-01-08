<?php

namespace App\Element;

use App\Core\AbstractRepository;


class ElementRepository extends AbstractRepository
{
    public function getTableName()
    {
        return 'elements';
    }

    public function getModelName()
    {
        return 'App\\Element\\ElementModel';
    }
    
}