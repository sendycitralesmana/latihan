<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Mail\TestSendingEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $students = Students::all();
        Mail::to('yoga@gmail.com')->send(new TestSendingEmail($students));
    }
}
