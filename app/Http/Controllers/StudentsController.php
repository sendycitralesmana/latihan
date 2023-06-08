<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Students;
use \App\Models\ClassRoom;

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

    public function add()
    {
        $class = ClassRoom::all();
        return view('students/add', [
            'class' => $class
        ]);
    }

    public function create(Request $request)
    {
        $students = new Students;
        $students->name = $request->name;
        $students->nis = $request->nis;
        $students->gender = $request->gender;
        $students->id_class = $request->id_class;
        $students->save();

        return redirect('/students')->with('success', 'Success add data');

        // $students = Students::create($request->all()); Mass assignment
    }

    public function detail($id)
    {
        // $students = Students::all();
        $students = Students::with(['class.teachers', 'ekskuls'])->find($id);     // eloquent relationship
        return view('students/detail', [
            'students' => $students
        ]);
    }

    public function edit($id)
    {
        $students = Students::with('class')->find($id);
        $class = ClassRoom::where('id', '!=', $students->id_class)->get();
        return view('students/edit', [
            'students' => $students,
            'class' => $class
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $students = Students::find($id);
        $students->name = $request->name;
        $students->nis = $request->nis;
        $students->gender = $request->gender;
        $students->id_class = $request->id_class;
        $students->save();

        return redirect('/students')->with('success', 'Success update data');
    }
}
