<?php

namespace App\Core;

use PDO;

abstract class AbstractRepository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    abstract public function getTableName();

    abstract public function getModelName();


    function fetchAllElements()
    {
        $model = $this->getModelName();
        $table = $this->getTableName();
        $qry = $this->pdo->query("SELECT * FROM `$table` JOIN `users` ON users.uid = elements.user_uid GROUP BY $table.id");
        $books = $qry->fetchAll(PDO::FETCH_CLASS, $model);
        return $books;
    }
}