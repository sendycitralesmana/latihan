<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewsLetter;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Mail\TestSendingEmail;
use App\Jobs\ProcessNewsLetter;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $students = Students::all();
        Mail::to('yoga@gmail.com')->send(new TestSendingEmail($students));
    }

    public function newsletter()
    {
        $emails = User::pluck('email');

        foreach ($emails as $email) {
            ProcessNewsLetter::dispatch($email);
        }
    }
}
