<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBookRequest;
use App\Repositories\RepositoryInterface\BookRepositoryInterface;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;
use App\Repositories\RepositoryInterface\PublisherRepositoryInterface;
use App\Repositories\RepositoryInterface\BaseRepositoryInterface;

class BookController extends Controller
{
    protected $book;
    protected $category;
    protected $publisher;
    protected $author;

    public function __construct(
        BookRepositoryInterface $book, 
        CategoryRepositoryInterface $category, 
        PublisherRepositoryInterface $publisher, 
        BaseRepositoryInterface $author
    ){
        $this->book = $book;
        $this->category = $category;
        $this->publisher = $publisher;
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->getAll();

        return view('book.books', compact('books'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getAllNoPagination();
        $publishers = $this->publisher->getAllPublisher();
        $authors = $this->author->getAllAuthor();

        return view('book.create', compact('categories', 'publishers', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        if($this->book->create($request->all())) 
            return redirect()->route('admin.books.index')->with('message', ['msg' => trans('admin.book.create_success'), 'status' => 'success']);

        return redirect()->route('admin.books.index')->with('message', ['msg' => trans('admin.book.create_error'), 'status' => 'error']);               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
