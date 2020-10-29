<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\Config;
use App\Repositories\RepositoryInterface\PublisherRepositoryInterface;
use App\Exports\PublisherExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class PublisherController extends Controller
{
    protected $publisherRepository;

    public function __construct(PublisherRepositoryInterface $publisherRepository){
        $this->publisherRepository = $publisherRepository;
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
            $publishers = $this->publisherRepository->getPublisher();
        } else {
            $publishers = $this->publisherRepository->getWithKey($key);
            $request->session()->put('search', $key);
        }
        return view('publishers.view', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publishers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        if ($this->publisherRepository->createPublisher($request->all())) {
            return redirect()->route('admin.publishers.index')->with('add_success', trans('message.author.add_success'));
        }

        return redirect()->route('admin.publishers.index')->with('Fail', trans('message.author.add_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pubId)
    {
        $publisher = $this->publisherRepository->findPublisher($pubId);
        $books = $this->publisherRepository->getBook($pubId);

        return view('publishers.detail', compact('publisher', 'books'));
    }

    public function showAll(Request $request) 
    {
        $key = $request->input('search');
        if (!$key) {
            $publishers = $this->publisherRepository->getPublisher();
        }
        $publishers = $this->publisherRepository->getWithKey($key);

        return view('publishers.viewAll', compact('publishers'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pubId)
    {
        $publisher = $this->publisherRepository->findPublisher($pubId);

        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, $pubId)
    {
        $update = $this->publisherRepository->updatePublisher($pubId, $request->all());
        if ($update) {
            return redirect()->route('admin.publishers.index')->with('update_success', trans('message.author.update_success'));
        }
            
        return redirect()->route('admin.publishers.edit')->with('Fail', trans('message.author.update_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pubId)
    {
        $deleteResult = $this->publisherRepository->deletePublisher($pubId);
        if ($deleteResult) {
            return redirect()->route('admin.publishers.index')->with('del_success', trans('message.author.del_success'));
        }

        return redirect()->back()->with('Fail', trans('message.author.del_fail'));
    }

    public function export(Request $request)
    {
        if($request->session()->has('search')) {
            $queryValue = $request->session()->get('search');

            return (new PublisherExport($queryValue))->download(Config::get('app.exportPublisher'));
        }
        return redirect()->back();
        
    }
}
