<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Requests\Teacher\TeacherCreateRequest;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers/index', [
            'teachers' => $teachers
        ]);
    }

    public function show_delete()
    {
        // $students = Students::withTrashed()->get(); // show data with soft delete
        $teachers = Teacher::onlyTrashed()->get();
        return view('teachers/show_delete', [
            'teachers' => $teachers
        ]);
    }

    public function add()
    {
        return view('teachers/add');
    }

    public function create(TeacherCreateRequest $request)
    {
        $teachers = new Teacher;
        $teachers->name = $request->name;
        $teachers->save();

        return redirect('/teachers')->with('success', 'Success add data');
    }

    public function detail($id)
    {
        // $teacher = Teacher::all();
        $teachers = Teacher::with('class.students')->findOrFail($id);     // eloquent relationship
        return view('teachers/detail', [
            'teachers' => $teachers
        ]);
    }

    public function edit($id)
    {
        $teachers = Teacher::findOrFail($id);
        return view('teachers/edit', [
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $teachers = Teacher::findOrFail($id);
        $teachers->name = $request->name;
        $teachers->save();

        return redirect('/teachers')->with('success', 'Success update data');
    }

    public function delete($id)
    {
        $teachers = Teacher::findOrFail($id);
        $teachers->delete();

        return redirect('/teachers')->with('success', 'Success delete data dengan id' . $id );
    }

    public function restore($id)
    {
        $teachers = Teacher::withTrashed()->where('id', $id)->restore();
        
        return redirect('/teachers')->with('success', 'Success restore data');
    }
}
