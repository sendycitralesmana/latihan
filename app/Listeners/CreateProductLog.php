<?php

namespace App\Listeners;
// php artisan make:listener CreateProductLog --event=ProductCreated

use App\Models\LogActivities;
use App\Events\ProductCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProductLog
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
        $logs = new LogActivities;
        $logs->description = "Create product ".$event->product->name;
        $logs->save();
    }
}
