<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface\BorrowRepositoryInterface;
use Carbon\Carbon;
use App\Enums\BorrowStatus;
use App\Http\Controllers\SendNotification;
use Auth;

class BorrowController extends Controller
{
    protected $borrow;
    protected $notification;

    public function __construct(
        BorrowRepositoryInterface $borrow,
        SendNotification $notification
    ){
        $this->borrow = $borrow;
        $this->notification = $notification;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $now = Carbon::now();
        $borrowing = BorrowStatus::borrowing;
        $paid = BorrowStatus::paid;
        $fullname = $request->input('fullname');
        $status = $request->input('status');
        if ($request->has('fullname') || $request->has('status')) {
            $borrows = $this->borrow->getQuerySearch($fullname, $status);
        } else {
            $borrows = $this->borrow->getAll();
        }
        return view('borrows.view', compact(
            'borrows', 
            'now',
            'borrowing',
            'paid'
        ));
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
        $attributes = ['borr_status' => $request->input('borr_status')];
        $this->borrow->update($id, $attributes);
        $getData = $this->borrow->find($id);
        if($request->input('borr_status') == config('app.borr_status_accept')){ // accept
            $this->notification->sendToUser($getData->user_id, array('title' => trans('main.notification.borrow_accept'), 'content' => trans('main.notification.borrow_content', ['id' => $id, 'name' => $getData->book->book_title])));
        } elseif($request->input('borr_status') == config('app.borr_status_reject')){ // reject
            $this->notification->sendToUser($getData->user_id, array('title' => trans('main.notification.borrow_reject'), 'content' => trans('main.notification.borrow_content', ['id' => $id, 'name' => $getData->book->book_title])));
        }

        return redirect()->back();
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
