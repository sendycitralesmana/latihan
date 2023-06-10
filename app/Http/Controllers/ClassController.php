<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\Class\ClassCreateRequest;
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

    public function show_delete()
    {
        // $students = Students::withTrashed()->get(); // show data with soft delete
        $class = ClassRoom::onlyTrashed()->get();
        return view('class/show_delete', [
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

    public function create(ClassCreateRequest $request)
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
        $class = ClassRoom::with('students', 'teachers')->findOrFail($id);    // eloquent relationship
        return view('Class.detail', [
            'class' => $class
        ]);
    }

    public function edit($id)
    {
        $class = ClassRoom::with('teachers')->findOrFail($id);
        $teachers = Teacher::where('id', '!=', $class->id_teacher)->get();
        return view('class/edit', [
            'class' => $class,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $class = ClassRoom::findOrFail($id);
        $class->name = $request->name;
        $class->id_teacher = $request->id_teacher;
        $class->save();

        return redirect('/class')->with('success', 'Success update data');
    }

    public function delete($id)
    {
        $class = ClassRoom::findOrFail($id);
        $class->delete();

        return redirect('/class')->with('success', 'Success delete data dengan id' . $id );
    }

    public function restore($id)
    {
        $class = ClassRoom::withTrashed()->where('id', $id)->restore();
        
        return redirect('/class')->with('success', 'Success restore data');
    }
}