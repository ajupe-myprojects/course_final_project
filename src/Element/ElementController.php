<?php

namespace App\Element;

use App\Comments\CommentRepository;
use App\Core\AbstractController;
use App\Helper\FormHelper;
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
}