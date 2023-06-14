<?php

namespace App\Http\Controllers;

use \App\Models\Teacher;
use \App\Models\ClassRoom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \App\Http\Requests\Class\ClassCreateRequest;

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
        $class->slug = Str::slug($request->name, '-');
        $class->save();

        return redirect('/class')->with('success', 'Success add data');
    }

    public function detail($slug)
    {
        // $class = ClassRoom::all();
        $class = ClassRoom::with('students', 'teachers')
                    ->where('slug', $slug)->first();      // eloquent relationship
        return view('Class.detail', [
            'class' => $class
        ]);
    }

    public function edit($slug)
    {
        $class = ClassRoom::with('teachers')
                    ->where('slug', $slug)->first();
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
        $class->slug = Str::slug($request->name, '-');
        $class->save();

        return redirect('/class')->with('success', 'Success update data');
    }

    public function massUpdate()    // isi column slug yang masih null
    {
        $class = ClassRoom::whereNull('slug')->get();
        collect($class)->map(function($item) {
            $item->slug = Str::slug($item->name, '-');
            $item->save();
        });

        return redirect('/class')->with('success', 'Success update data');
    }

    public function delete($slug)
    {
        $class = ClassRoom::where('slug', $slug)->first();
        $class->delete();

        return redirect('/class')->with('success', 'Success delete data dengan id' . $slug );
    }

    public function restore($slug)
    {
        $class = ClassRoom::withTrashed()->where('slug', $slug)->restore();
        
        return redirect('/class')->with('success', 'Success restore data');
    }
}