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

    public function addNewElement($title, $author, $isbn, $genre, $desc, $arr_img)
    {
        $table = $this->getTableName();
        if($arr_img[0] === '!NO_IMAGE!'){
            $pic = 'no image';
        }else{
            $pic = $arr_img[0];
        }
        if($arr_img[1] === '!NO_IMAGE!'){
            $thumb = 'no image';
        }else{
            $thumb = $arr_img[1];
        }
        $uid = $_SESSION['login']['uid'];

        $qry = $this->pdo->prepare("INSERT INTO `$table` (`element_title`, `element_author`, `element_isbn`, `element_genre`, `element_description`, `element_pic`, `element_thumb`, `user_uid`) VALUES (:title, :author, :isbn, :genre, :descript, :pic, :thumb, :usid)");
        $qry->execute(['title' => $title, 'author' => $author, 'isbn' => $isbn, 'genre' => $genre, 'descript' => $desc, 'pic' => $pic, 'thumb' => $thumb, 'usid' => $uid]);
    }
}