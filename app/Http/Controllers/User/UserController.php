<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $menu_products = Product::where('trending', '1')->take(15)->get();
        return view('frontend.index', compact('menu_products'));
    }

    public function productView($prod_name)
    {
        if (Product::where('name', $prod_name)->exists()) {
            $products = Product::where('name', $prod_name)->first();
            return view('frontend.view', compact('products'));
        } else {
            return redirect('/')->with('status', 'Product not exists!');
        }
    }
}