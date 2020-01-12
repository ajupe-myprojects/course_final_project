<?php

namespace App\Element;

use App\Core\AbstractRepository;
use PDO;

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
    
    public function fetchSingleBook($id)
    {
        $model = $this->getModelName();
        $table = $this->getTableName();
        $qry = $this->pdo->prepare("SELECT * FROM `$table` JOIN `users` ON users.uid = $table.user_uid WHERE $table.id = ?");
        $qry->execute([$id]);
        $qry->setFetchMode(PDO::FETCH_CLASS, $model);
        $book_single = $qry->fetch(PDO::FETCH_CLASS);
        return $book_single;
    }
}