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

    public function verifyEmail($mail)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();

        if($mail !== '!ERROR!'){

            $qry = $this->pdo->query("SELECT * FROM `$table` WHERE $table.email = '$mail'");
            $verify = $qry->fetchAll(PDO::FETCH_CLASS, $model);
            return $verify;
        }else{
            return [];
        }
    }

    public function verifyPassword($pw)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $uid = $_SESSION['login']['uid'];
        if($pw !== '!ERROR!'){
            $qry = $this->pdo->prepare("SELECT * FROM `$table` WHERE $table.uid = ?");
            $qry->execute([$uid]);
            $qry->setFetchMode(PDO::FETCH_CLASS, $model);
            $user = $qry->fetch(PDO::FETCH_CLASS);
            if(password_verify($pw, $user->password)){
                return true;
            }
        }
        return false;
    }

    public function changePass($mail,$pass)
    {
        $table = $this->getTableName();
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $qry = $this->pdo->prepare("UPDATE `$table` SET `password`= ? WHERE `email`= ?");
        $qry->execute([$pass, $mail]);
    }

    public function updatePassword($pw)
    {
        $table = $this->getTableName();
        $uid = $_SESSION['login']['uid'];
        $pass = password_hash($pw, PASSWORD_DEFAULT);
        $qry = $this->pdo->prepare("UPDATE `$table` SET `password`= ? WHERE `uid`= ?");
        $qry->execute([$pass, $uid]);
    }

    //Ajax goodies
    public function getAllUsers()
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $qry = $this->pdo->query("SELECT * FROM `$table`");
        $users = $qry->fetchAll(PDO::FETCH_CLASS, $model);
        return json_encode($users);
    }
}