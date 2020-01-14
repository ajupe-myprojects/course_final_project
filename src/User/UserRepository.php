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

    public function signInUser($mail, $username, $password)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $qry = $this->pdo->prepare("INSERT INTO `$table` (`email`, `username`, `password`, `user_role`) VALUES (:email, :username, :pw, :rol)");
        $qry->execute(['email' => $mail, 'username' => $username, 'pw' => $pass, 'rol' => 1]);
    }
}