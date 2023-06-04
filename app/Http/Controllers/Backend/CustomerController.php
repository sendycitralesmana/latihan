<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Customer;
use \App\Models\Social_Media;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('backend/customer/index', [
            'customer' => $customer
        ]);
    }

    public function add()
    {
        return view('backend/customer/add');
    }

    public function create(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->religion = $request->religion;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $social_media = new Social_Media;
        $social_media->id_customer = $customer->id;
        $social_media->social_media = $request->social_media;
        $social_media->username = $request->username;
        $social_media->save();

        return redirect('/customer')->with('success', 'Add data success');
    }

    public function edit()
    {
        return view('backend/customer/edit');
    }

}
