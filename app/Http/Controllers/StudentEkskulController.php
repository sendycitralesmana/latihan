<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentEkskulController extends Controller
{
    public function attackDettach()
    {
        $student = Students::find(1);
        // $student->ekskuls()->attach(2);
        // $student->ekskuls()->attach([1,3]);
        $student->ekskuls()->detach(2);
        // $student->ekskuls()->attach([1,3]);
        // $student->ekskuls()->sync([1, 3]);   -> cek data di table jika ada student:1 ekskul:1&3 maka akan dipertahankan dan sebaliknya
    }
}
