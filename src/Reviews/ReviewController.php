<?php

namespace App\Reviews;

use App\Core\AbstractController;
use App\Comments\CommentRepository;


class ReviewController extends AbstractController
{
    public function __construct(ReviewRepository $reviewRepository, CommentRepository $commentRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->commentRepository = $commentRepository;
    }

    
}