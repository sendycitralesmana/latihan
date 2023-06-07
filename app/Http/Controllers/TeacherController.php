<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers/index', [
            'teachers' => $teachers
        ]);
    }

    public function detail($id)
    {
        // $teacher = Teacher::all();
        $teachers = Teacher::with('class.students')->find($id);     // eloquent relationship
        return view('teachers/detail', [
            'teachers' => $teachers
        ]);
    }
}
