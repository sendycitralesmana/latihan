<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StudentCreateRequest;
use Illuminate\Http\Request;
use \App\Models\Students;
use \App\Models\ClassRoom;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        // $students = Students::all();
        // $students = Students::with('class.teachers', 'ekskuls')->get();     // eloquent relationship
        $search = $request->search;
        $students = Students::with('class')
                        ->where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('gender', $search)
                        ->orWhere('nis', 'LIKE', '%'.$search.'%')
                        ->orWhereHas('class', function($classname) use($search) {
                            $classname->where('name', 'LIKE', '%'.$search.'%');
                        }) // relasi ke class
                        ->paginate(5);
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
        $newName = "";
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('image', $newName);
        }
        // data di folder storage tidak bisa di akses di browser kita maka harus kita hubungkan ke folder publik
        // php artisan storage:link
        
        $students = new Students;
        $students->name = $request->name;
        $students->nis = $request->nis;
        $students->gender = $request->gender;
        $students->id_class = $request->id_class;
        $students->image = $newName;
        $students->slug = Str::slug($request->name, '-');
        $students->save();
        
        // php artisan make:request nama_request -> app->http->request
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'nis' => 'unique:students',
        //     'gender' => 'required',
        //     'id_class' => 'required'
        // ]);
        return redirect('/students')->with('success', 'Success add data');

        // $students = Students::create($request->all()); Mass assignment
    }

    public function detail($slug)
    {
        // $students = Students::all();
        $students = Students::with(['class.teachers', 'ekskuls'])
                    ->where('slug', $slug)->first();     // eloquent relationship
        return view('students/detail', [
            'students' => $students
        ]);
    }

    public function edit($slug)
    {
        // $students = Students::with('class')->findOrFail($slug);
        $students = Students::with('class')
                    ->where('slug', $slug)->first();
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
        $students->slug = Str::slug($request->name, '-');
        $students->save();

        return redirect('/students')->with('success', 'Success update data');
    }

    public function massUpdate()    // isi column slug yang masih null
    {
        // $students = Students::all(); //
        $students = Students::whereNull('slug')->get();
        collect($students)->map(function($item) {
            $item->slug = Str::slug($item->name, '-');
            $item->save();
        });

        return redirect('/students')->with('success', 'Success update data');
    }

    public function delete($slug)
    {
        // $students = Students::findOrFail($id);
        $students = Students::where('slug', $slug)->first();;
        $students->delete();

        return redirect('/students')->with('success', 'Success delete data dengan id' . $slug );
    }

    public function restore($slug)
    {
        $students = Students::withTrashed()->where('slug', $slug)->restore();
        
        return redirect('/students')->with('success', 'Success restore data');
    }
}
