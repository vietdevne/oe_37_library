<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;
use App\Repositories\RepositoryInterface\BookRepositoryInterface;
use App\Repositories\RepositoryInterface\PublisherRepositoryInterface;
use App\Http\Controllers\SendNotification;

class HomeController extends Controller
{
    protected $category;
    protected $book;
    protected $publisher;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CategoryRepositoryInterface $category,
        BookRepositoryInterface $book,
        PublisherRepositoryInterface $publisher,
        SendNotification $notification
    ) {
        $this->category = $category;
        $this->book = $book;
        $this->publisher = $publisher;
        $this->notification = $notification;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastest = $this->book->getLastestBook();
        $publishers = $this->publisher->getRandomPublisher();
        $favourite = $this->book->getFavouriteBook();
        return view('home', compact('lastest', 'favourite', 'publishers'));
    }
}
