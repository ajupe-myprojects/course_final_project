<?php

namespace App\Comments;

use App\Core\AbstractModel;
use App\Core\AbstractRepository;
use PDO;

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

    public function fetchBookRevComments($id)
    {
        $model = $this->getModelName();
        $table = $this->getTableName();
        $qry = $this->pdo->prepare("SELECT * FROM `$table` JOIN `users` ON users.uid = $table.comment_user_uid WHERE $table.comment_el_id = ? ");
        $qry->execute([$id]);
        $rev_comments = $qry->fetchAll(PDO::FETCH_CLASS, $model);
        return $rev_comments;
    }

    public function addNewComment($title, $text, $ele_id, $rev_id, $user_id)
    {
        $table = $this->getTableName();
        $qry = $this->pdo->prepare("INSERT INTO `$table` (`comment_title`, `comment_text`, `comment_rev_rid`, `comment_el_id`, `comment_user_uid`) VALUES (:title, :ctext, :revrid, :elid, :usid)");
        $qry->execute(['title' => $title, 'ctext' => $text, 'revrid' => $rev_id, 'elid' => $ele_id, 'usid' => $user_id]);
    }
}