<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::all();
        return view('countries/index', [
            'country' => $country
        ]);
    }

    public function upsert()
    {
        $country = Country::updateOrCreate(
            ['name' => 'japan'],    // kondisi
            [
                'name' => 'japan',
                'capital_city' => 'tokyo',
                'currency' => 'yen',
            ]
        );
    }
}
