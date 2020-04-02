<?php

namespace App\Jobs;

use App\Notifications\RegsisterSuccess;
use App\Notifications\SendPurchaseReceiptEmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;

class SendPurchaseReceiptEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public  $user;
    public $amount;
    public $ref;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$amount,$ref)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->ref = $ref;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::send($this->user, new SendPurchaseReceiptEmailNotification($this->user,$this->amount,$this->ref));

    }
}
