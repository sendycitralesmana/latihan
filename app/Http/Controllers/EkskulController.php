<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Ekskul\EkskulCreateRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;


class EkskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::all();
        // $ekskuls = Ekskul::with('students')->get();
        return view('ekskuls.index', [
            'ekskuls' => $ekskuls
        ]);
    }

    public function show_delete()
    {
        // $students = Students::withTrashed()->get(); // show data with soft delete
        $ekskuls = Ekskul::onlyTrashed()->get();
        return view('ekskuls/show_delete', [
            'ekskuls' => $ekskuls
        ]);
    }
    
    public function add()
    {
        return view('ekskuls/add');
    }

    public function create(EkskulCreateRequest $request)
    {
        $ekskuls = new Ekskul;
        $ekskuls->name = $request->name;
        // $ekskuls->slug = Str::slug($request->name, '-');
        $ekskuls->slug = SlugService::createSlug(Ekskul::class, 'slug', $request->name);
        $ekskuls->save();

        // $ekskuls = Ekskul::create($request->all());

        return redirect('/ekskuls')->with('success', 'Success add data');
    }

    public function detail($slug)
    {
        // $ekskuls = Ekskul::all();
        $ekskuls = Ekskul::with('students')
                    ->where('slug', $slug)->first();  
        return view('ekskuls.detail', [
            'ekskuls' => $ekskuls
        ]);
    }

    public function edit($slug)
    {
        $ekskuls = Ekskul::where('slug', $slug)->first();;
        return view('ekskuls/edit', [
            'ekskuls' => $ekskuls
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $ekskuls = Ekskul::findOrFail($id);
        // $ekskuls->name = $request->name;
        // $ekskuls->slug = Str::slug($request->name, '-');
        // $ekskuls->save();

        // mass assignment
        $ekskuls['slug'] = SlugService::createSlug(Ekskul::class, 'slug', $request->name);
        $ekskuls->update($request->all());

        return redirect('/ekskuls')->with('success', 'Success update data');
    }

    public function massUpdate()    // isi column slug yang masih null
    {
        $ekskuls = Ekskul::whereNull('slug')->get();
        collect($ekskuls)->map(function($item) {
            $item->slug = Str::slug($item->name, '-');
            $item->save();
        });

        return redirect('/ekskuls')->with('success', 'Success update data');
    }

    public function delete($slug)
    {
        $ekskuls = Ekskul::where('slug', $slug)->first();;
        $ekskuls->delete();

        return redirect('/ekskuls')->with('success', 'Success delete data dengan id' . $slug );
    }

    public function restore($slug)
    {
        $ekskuls = Ekskul::withTrashed()->where('slug', $slug)->restore();
        
        return redirect('/ekskuls')->with('success', 'Success restore data');
    }
}
