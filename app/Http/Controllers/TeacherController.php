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

    public function add()
    {
        return view('teachers/add');
    }

    public function create(Request $request)
    {
        $teachers = new Teacher;
        $teachers->name = $request->name;
        $teachers->save();

        return redirect('/teachers')->with('success', 'Success add data');
    }

    public function detail($id)
    {
        // $teacher = Teacher::all();
        $teachers = Teacher::with('class.students')->find($id);     // eloquent relationship
        return view('teachers/detail', [
            'teachers' => $teachers
        ]);
    }

    public function edit($id)
    {
        $teachers = Teacher::find($id);
        return view('teachers/edit', [
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $teachers = Teacher::find($id);
        $teachers->name = $request->name;
        $teachers->save();

        return redirect('/teachers')->with('success', 'Success update data');
    }
}
