<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ClassRoom;

class ClassController extends Controller
{
    public function index()
    {
        // $class = ClassRoom::all();
        $class = ClassRoom::with('students', 'teachers')->get();    // eloquent relationship
        return view('Class.index', [
            'class' => $class
        ]);
    }
}