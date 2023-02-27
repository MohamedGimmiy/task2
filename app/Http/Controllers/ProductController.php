<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('products',compact('products'));
    }

    public function create_product(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255|unique:products',
            'price' => 'required',
            'category_name' => 'required'
        ]);

        Product::create($validated);

        return back()->with('success','product created successfully');
    }
}
