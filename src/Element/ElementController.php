<?php

namespace App\Element;

use App\Comments\CommentRepository;
use App\Core\AbstractController;
use App\Helper\FormHelper;
use App\Helper\Validator;
use App\Reviews\ReviewRepository;

class ElementController extends AbstractController
{
    public function __construct(ElementRepository $elementRepository, ReviewRepository $reviewRepository, CommentRepository $commentRepository)
    {
        $this->elementRepository = $elementRepository;
        $this->reviewRepository = $reviewRepository;
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $booklist = $this->elementRepository->fetchAllElements();
        $this->render('page_main_book_list', ['booklist' => $booklist]);
    }

    public function fetchBook()
    {
        $forms = new FormHelper();
        $requests = $forms->getRequests();
        $book_id = $requests['id'];
        $book_single = $this->elementRepository->fetchSingleBook($book_id);
        $book_rev = $this->reviewRepository->fetchBookReviews($book_id);
        $rev_comments = $this->commentRepository->fetchBookRevComments($book_id);
        $this->render('page_main_book_single', ['book' => $book_single, 'book_rev' => $book_rev, 'rev_comments' => $rev_comments]);
    }

    public function addReview()
    {
        $val = new Validator();
        $title = $val->checkText('review-title');
        $text = $val->checkText('review-text');
        $id = $val->checkText('book-id');
        $user_id = $_SESSION['login']['uid'];
        $this->reviewRepository->addNewRev($title, $text, $id, $user_id);
        header('Location: book-single?id='.$id);
    }
    public function addComment()
    {
        $val = new Validator();
        $title = $val->checkText('comm-title');
        $text = $val->checkText('comm-text');
        $ele_id = $val->checkText('el-id');
        $rev_id = $val->checkText('rev-id');
        $user_id = $_SESSION['login']['uid'];
        $this->commentRepository->addNewComment($title, $text, $ele_id, $rev_id, $user_id);
        header('Location: book-single?id='.$ele_id);
    }

}