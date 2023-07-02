<?php

namespace App\Listeners;
// php artisan make:listener SendMailToProduct --event=ProductCreated

use App\Events\ProductCreated;
use App\Mail\TestSendingEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToProduct
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event): void
    {
        Mail::to($event->product->name)->send(new TestSendingEmail($event->product));
    }
}
