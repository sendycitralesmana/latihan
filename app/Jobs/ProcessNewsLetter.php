<?php

namespace App\Jobs;
// php artisan make:job ProcessNewsLetter
// php artisan queue:table -> only create 1x
// QUEUE_CONNECTION=database in .env
// php artisan queue:work -> kirim email sesuai data di table jobs
//                        -> jika ada perubahan di codingan maka command harus di ctrl+c
//                        -> jalankan kembali

use App\Mail\NewsLetter;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessNewsLetter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;

    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new NewsLetter());
    }
}
