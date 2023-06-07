<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        // $students = Students::with('class.teachers', 'ekskuls')->get();     // eloquent relationship
        return view('students/index', [
            'students' => $students
        ]);
    }

    public function detail($id)
    {
        // $students = Students::all();
        $students = Students::with(['class.teachers', 'ekskuls'])->find($id);     // eloquent relationship
        return view('students/detail', [
            'students' => $students
        ]);
    }
}
