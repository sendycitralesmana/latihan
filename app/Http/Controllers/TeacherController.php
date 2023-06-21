<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Teacher\TeacherCreateRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
        // $teachers->slug = Str::slug($request->name, '-');
        $teachers->slug = SlugService::createSlug(Teacher::class, 'slug', $request->name);
        $teachers->save();

        return redirect('/teachers')->with('success', 'Success add data');
    }

    public function detail($slug)
    {
        // $teacher = Teacher::all();
        $teachers = Teacher::with('class.students')
                    ->where('slug', $slug)->first();      // eloquent relationship
        return view('teachers/detail', [
            'teachers' => $teachers
        ]);
    }

    public function edit($slug)
    {
        $teachers = Teacher::where('slug', $slug)->first();;
        return view('teachers/edit', [
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $teachers = Teacher::findOrFail($id);
        $teachers->name = $request->name;
        // $teachers->slug = Str::slug($request->name, '-');
        $teachers->slug = SlugService::createSlug(Teacher::class, 'slug', $request->name);
        $teachers->save();

        return redirect('/teachers')->with('success', 'Success update data');
    }

    public function massUpdate()    // isi column slug yang masih null
    {
        $teachers = Teacher::whereNull('slug')->get();
        collect($teachers)->map(function($item) {
            $item->slug = Str::slug($item->name, '-');
            $item->save();
        });

        return redirect('/teachers')->with('success', 'Success update data');
    }

    public function delete($slug)
    {
        $teachers = Teacher::where('slug', $slug)->first();;
        $teachers->delete();

        return redirect('/teachers')->with('success', 'Success delete data dengan id' . $slug );
    }

    public function restore($slug)
    {
        $teachers = Teacher::withTrashed()->where('slug', $slug)->restore();
        
        return redirect('/teachers')->with('success', 'Success restore data');
    }
}
