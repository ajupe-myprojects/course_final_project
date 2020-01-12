<?php

namespace App\User;

use App\Core\AbstractRepository;
use PDO;


class UserRepository extends AbstractRepository
{
    public function getTableName()
    {
        return 'users';
    }

    public function getModelName()
    {
        return 'App\\User\\UserModel';
    }

    public function getByEmail($mail)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $qry = $this->pdo->prepare("SELECT * FROM `$table` WHERE email= ?");
        $qry->execute([$mail]);
        $qry->setFetchMode(PDO::FETCH_CLASS, $model);
        $user = $qry->fetch(PDO::FETCH_CLASS);
        return $user;  
    }
}