<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ClassRoom;
use \App\Models\Teacher;

class ClassController extends Controller
{
    public function index()
    {
        $class = ClassRoom::all();
        // $class = ClassRoom::with('students', 'teachers')->get();    // eloquent relationship
        return view('Class.index', [
            'class' => $class
        ]);
    }

    public function add()
    {
        $teachers = Teacher::all();
        return view('class/add', [
            'teachers' => $teachers
        ]);
    }

    public function create(Request $request)
    {
        $class = new ClassRoom;
        $class->name = $request->name;
        $class->id_teacher = $request->id_teacher;
        $class->save();

        return redirect('/class')->with('success', 'Success add data');
    }

    public function detail($id)
    {
        // $class = ClassRoom::all();
        $class = ClassRoom::with('students', 'teachers')->find($id);    // eloquent relationship
        return view('Class.detail', [
            'class' => $class
        ]);
    }
}