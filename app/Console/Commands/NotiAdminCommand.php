<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\Borrow;
use App\Enums\BorrowStatus;
use App\Models\User;
use App\Notifications\RequestToAdmin;
use Pusher\Pusher;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\SendNotification;

class NotiAdminCommand extends Command
{
    protected $notification;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notice everyday for admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SendNotification $notification)
    {
        parent::__construct();
        $this->notification = $notification;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $numberOfBorrow = Borrow::where('borr_status', BorrowStatus::request)->count();
        $data = [
            'title' => trans('main.notification.noti_everyday'),
            'content' => trans('main.notification.noti_everyday_content') . $numberOfBorrow,
        ];
        $this->notification->sendToAdmin($data);
    }
}
