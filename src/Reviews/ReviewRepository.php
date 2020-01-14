<?php

namespace App\Reviews;

use App\Core\AbstractRepository;
use PDO;

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

    public function fetchBookReviews($id)
    {
        $model = $this->getModelName();
        $table = $this->getTableName();
        $qry = $this->pdo->prepare("SELECT * FROM `$table` JOIN `users` ON users.uid = $table.rev_user_uid WHERE $table.rev_element_id = ? GROUP BY $table.rid");
        $qry->execute([$id]);
        $book_reviews = $qry->fetchAll(PDO::FETCH_CLASS, $model);
        return $book_reviews;
    }

    public function addNewRev($title, $text, $id, $user_id)
    {
        $table = $this->getTableName();
        $qry = $this->pdo->prepare("INSERT INTO `$table` (`rev_title`, `rev_text`, `rev_element_id`, `rev_user_uid`) VALUES (:title, :rtext, :id, :usid)");
        $qry->execute(['title' => $title, 'rtext' => $text, 'id' => $id, 'usid' => $user_id]);
    }
}