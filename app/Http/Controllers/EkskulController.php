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

    public function detail($id)
    {
        // $ekskuls = Ekskul::all();
        $ekskuls = Ekskul::with('students')->find($id);
        return view('ekskuls.detail', [
            'ekskuls' => $ekskuls
        ]);
    }
}
