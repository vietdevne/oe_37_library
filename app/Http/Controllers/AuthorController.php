<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Config;
use App\Repositories\RepositoryInterface\BaseRepositoryInterface;
use App\Exports\AuthorExport;
use Maatwebsite\Excel\Facades\Excel;

class AuthorController extends Controller
{
    protected $authorRepository;
    protected $book;

    public function __construct(BaseRepositoryInterface $authorRepository) 
    {
        $this->authorRepository = $authorRepository;
        // $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        $key = $request->input('search');
        if (!$key) {
            $authors = $this->authorRepository->getAuthor();
        } else {
            $authors = $this->authorRepository->getWithKey($key);
            $request->session()->put('search', $key);
        }
        return view('authors.view', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        if ($this->authorRepository->createAuthor($request->only('author_name', 'author_avatar', 'author_desc'))) {
            return redirect()->route('admin.authors.index')->with('add_success', trans('message.author.add_success'));
        }

        return redirect()->route('admin.authors.index')->with('Fail', trans('message.author.add_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($authorId)
    {
        $author = $this->authorRepository->findAuthor($authorId);
        $books = $this->authorRepository->getBooks($authorId);

        return view('authors.detail', compact('author', 'books'));
    }

    public function showForUser(Request $request)
    {
        $key = $request->input('search');
        if (!$key) {
            $authors = $this->authorRepository->getAuthor();
        } else {
            $authors = $this->authorRepository->getWithKey($key);
        }
        return view('authors.viewAll', compact('authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($authorId)
    {
        $author = $this->authorRepository->findAuthor($authorId);

        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $authorId)
    {
        $update = $this->authorRepository->updateAuthor($authorId, $request->all());
        if ($update) {
            return redirect()->route('admin.authors.index')->with('update_success', trans('message.author.update_success'));
        }

        return redirect()->route('admin.authors.edit')->with('Fail', trans('message.author.update_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($authorId)
    {
        $deleteResult = $this->authorRepository->deleteAuthor($authorId);
        if ($deleteResult) {
            return redirect()->route('admin.authors.index')->with('del_success', trans('message.author.del_success'));
        }
        
        return redirect()->back()->with('Fail', trans('message.author.del_fail'));
    }

    public function export(Request $request)
    {
        if($request->session()->has('search')) {
            $queryValue = $request->session()->get('search');

            return (new AuthorExport($queryValue))->download(Config::get('app.exportAuthor'));
        }
        return redirect()->back(); 
    }
}
