<?php

namespace App\Element;

use App\Core\AbstractController;


class ElementController extends AbstractController
{
    public function __construct(ElementRepository $elementRepository)
    {
        $this->elementRepository = $elementRepository;
    }

    public function index()
    {
        $booklist = $this->elementRepository->fetchAllElements();
        $this->render('page_main_book_list', ['booklist' => $booklist]);
    }
}