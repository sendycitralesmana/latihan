<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\School;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        // composer require laravel/scout
        if($request->search) {
            $schools = School::search($request->search)->get();
        } else {
            $schools = School::all();
        }
        return view('schools/index', [
            'schools' => $schools
        ]);
    }

    public function exportPdf()
    {
        // composer require barryvdh/laravel-dompdf
        $schools = School::all();
        $pdf = Pdf::loadView('schools/school-pdf', [
            'schools' => $schools
        ]);
        return $pdf->download('school-'.Carbon::now()->timestamp.'.pdf');
    }
}
