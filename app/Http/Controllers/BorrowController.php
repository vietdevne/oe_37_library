<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface\BorrowRepositoryInterface;
use App\Models\Borrow;
use Carbon\Carbon;
use App\Enums\BorrowStatus;

class BorrowController extends Controller
{
    protected $borrow;

    public function __construct(BorrowRepositoryInterface $borrow)
    {
        $this->borrow = $borrow;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fullname = $request->input('fullname');
        $status = $request->input('status');
        if ($request->has('fullname') || $request->has('status')) {
            $borrows = $this->borrow->getQuerySearch($fullname, $status);
        } else {
            $borrows = $this->borrow->getAll();
        }
        return view('borrows.view', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update($id, Request $request)
    {
        $status = $request->input('borr_status');
        $attributes = ['borr_status' => $status];
        $returnDate = $this->borrow->getBookId($id);
        $attributes = $this->borrow->checkBorrowStatus($id, $status);
        $this->borrow->update($id, $attributes);

        return redirect()->route('admin.borrows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->borrow->delete($id);

        return redirect()->route('admin.borrows.index');
    }

    public function history($userId)
    {
        $users = $this->borrow->getHistoryBorrow($userId);

        return view('borrows.history', compact('users'));
    }
}
