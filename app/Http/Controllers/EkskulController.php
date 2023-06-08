<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\Ekskul\EkskulCreateRequest;
use App\Models\Ekskul;


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
    
    public function add()
    {
        return view('ekskuls/add');
    }

    public function create(ClassCreateRequest $request)
    {
        $ekskuls = new Ekskul;
        $ekskuls->name = $request->name;
        $ekskuls->save();

        return redirect('/ekskuls')->with('success', 'Success add data');
    }

    public function detail($id)
    {
        // $ekskuls = Ekskul::all();
        $ekskuls = Ekskul::with('students')->findOrFail($id);
        return view('ekskuls.detail', [
            'ekskuls' => $ekskuls
        ]);
    }

    public function edit($id)
    {
        $ekskuls = Ekskul::findOrFail($id);
        return view('ekskuls/edit', [
            'ekskuls' => $ekskuls
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $ekskuls = Ekskul::findOrFail($id);
        $ekskuls->name = $request->name;
        $ekskuls->save();

        return redirect('/ekskuls')->with('success', 'Success update data');
    }

    public function delete($id)
    {
        $ekskuls = Ekskul::findOrFail($id);
        $ekskuls->delete();

        return redirect('/ekskuls')->with('success', 'Success delete data dengan id' . $id );
    }
}
