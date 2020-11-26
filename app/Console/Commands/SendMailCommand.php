<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\RepositoryInterface\BorrowRepositoryInterface;
use Carbon\Carbon;
use App\Http\Controllers\SendNotification;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendNoti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected $borrow;
    protected $notification;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        BorrowRepositoryInterface $borrow,
        SendNotification $notification
    )
    {
        parent::__construct();
        $this->borrow = $borrow;
        $this->notification = $notification;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $borrows = $this->borrow->getBorrowing();
        foreach ($borrows as $borrow) {
            $user_id = $borrow->user_id;
            $title = trans('main.notification.borrow_request', ['id' => $borrow->borr_id]);
            if (Carbon::now() > $borrow->return_date){
                $content = trans('main.notification.borrow_msg_expired', ['name' => $borrow->book->book_title, 'time' => Carbon::now()->diffInDays($borrow->return_date)]);
            }else {
                $content = trans('main.notification.borrow_msg', ['name' => $borrow->book->book_title, 'time' => Carbon::now()->diff($borrow->return_date)->format('%H:%I:%S')]);  
            }

            $this->notification->sendToUser($user_id, array('title' => $title, 'content' => $content));
            
        }        
    }
}
