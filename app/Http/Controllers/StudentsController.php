<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StudentCreateRequest;
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

    public function show_delete()
    {
        // $students = Students::withTrashed()->get(); // show data with soft delete
        $students = Students::onlyTrashed()->get();
        return view('students/show_delete', [
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

    public function create(StudentCreateRequest $request)
    {
        // php artisan make:request nama_request -> app->http->request
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'nis' => 'unique:students',
        //     'gender' => 'required',
        //     'id_class' => 'required'
        // ]);

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
        $students = Students::with(['class.teachers', 'ekskuls'])->findOrFail($id);     // eloquent relationship
        return view('students/detail', [
            'students' => $students
        ]);
    }

    public function edit($id)
    {
        $students = Students::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $students->id_class)->get();
        return view('students/edit', [
            'students' => $students,
            'class' => $class
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $students = Students::findOrFail($id);
        $students->name = $request->name;
        $students->nis = $request->nis;
        $students->gender = $request->gender;
        $students->id_class = $request->id_class;
        $students->save();

        return redirect('/students')->with('success', 'Success update data');
    }

    public function delete($id)
    {
        $students = Students::findOrFail($id);
        $students->delete();

        return redirect('/students')->with('success', 'Success delete data dengan id' . $id );
    }

    public function restore($id)
    {
        $students = Students::withTrashed()->where('id', $id)->restore();
        
        return redirect('/students')->with('success', 'Success restore data');
    }
}
