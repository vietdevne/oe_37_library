<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;
use App\Repositories\RepositoryInterface\BookRepositoryInterface;

class HomeController extends Controller
{
    protected $category;
    protected $book;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CategoryRepositoryInterface $category,
        BookRepositoryInterface $book
    ){
        $this->category = $category;
        $this->book = $book;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastest = $this->book->getLastestBook();

        return view('home', compact('lastest'));
    }
}
