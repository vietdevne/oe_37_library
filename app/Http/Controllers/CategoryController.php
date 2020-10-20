<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getAll();

        return view('category.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getParent();

        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->category->create($request->all());
        
        return redirect()->route('admin.categories.index')->with('message', ['msg' => trans('admin.category_message.create_success'), 'status' => 'success']);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        $categories = $this->category->getParent();
        if(!$category) return redirect()->route('admin.categories.index')->with('message', ['msg' => trans('admin.category_message.not_found'), 'status' => 'danger']);
        
        return view('category.edit', compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoryRequest $request, $id)
    {
        $category = $this->category->update($id, $request->all());;
        if(!$category) return redirect()->route('admin.categories.index')->with('message', ['msg' => trans('admin.category_message.not_found'), 'status' => 'danger']);

        return redirect()->route('admin.categories.index')->with('message', ['msg' => trans('admin.category_message.edit_success'), 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->delete($id);
        if(!$category) return redirect()->route('admin.categories.index')->with('message', ['msg' => trans('admin.category_message.not_found'), 'status' => 'danger']);

        return redirect()->route('admin.categories.index')->with('message', ['msg' => trans('admin.category_message.del_success'), 'status' => 'success']);
    }
}
