<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        $ekskuls = new Ekskul;
        $ekskuls->name = $request->name;
        $ekskuls->save();

        return redirect('/ekskuls')->with('success', 'Success add data');
    }

    public function detail($id)
    {
        // $ekskuls = Ekskul::all();
        $ekskuls = Ekskul::with('students')->find($id);
        return view('ekskuls.detail', [
            'ekskuls' => $ekskuls
        ]);
    }
}
