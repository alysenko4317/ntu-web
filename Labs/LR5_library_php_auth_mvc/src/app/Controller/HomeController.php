<?php

namespace Controller;

use Framework\Session;
use Repository\BookRepository;

class HomeController extends Controller {

    private $bookRepository;

    public function __construct() {
        parent::__construct();
        $this->bookRepository = new BookRepository();
    }

    public function index() {
        Session::start();

        $isLoggedIn = Session::get('reader_id') !== null;
        $books = $this->bookRepository->getTopBooks();

        $this->data("isLoggedIn", $isLoggedIn);
        $this->data("books", $books);
        $this->data("book_count", count($books));

        $this->display("home");
    }
}
