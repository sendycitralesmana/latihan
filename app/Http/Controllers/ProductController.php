<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\LogActivities;
use App\Events\ProductCreated;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $products = new Product;
            $products->name = "Test product";
            $products->slug = SlugService::createSlug(Product::class, 'slug', $products->name);
            $products->save();

            $logs = new LogActivities;
            $logs->description = "Test product add by admin";
            $logs->save();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        return redirect('/products')->with('success', 'Success add data');
    }

    public function created()
    {
        $product = new Product;
        $product->name = "product@gmail.com";
        $product->slug = SlugService::createSlug(Product::class, 'slug', $product->name);
        $product->save();

        ProductCreated::dispatch($product);
    }
}
