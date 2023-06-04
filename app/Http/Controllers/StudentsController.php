<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        // $students = Students::all();
        $students = Students::with('class')->get();     // eloquent relationship
        return view('students/index', [
            'students' => $students
        ]);
    }
}
