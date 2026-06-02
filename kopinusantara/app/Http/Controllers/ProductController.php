<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }

    public function show(Request $request, $id) {
	    $product = Product::where('id', $id, null, null)->first(); 

	    return response()->json([
	    	'status' => 'success',
		'message' => 'Get product successfully',
		'data' => [
			'id' => $product->id,
			'name' => $product->name,
			'description' => $product->description,
			'price' => $product->price,
			'image_url' => $product->image_url,
			'category' => $product->category->name
		]
	    ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required',
            'image' => 'required'
        ]);

        $image = $request->file('image');
        $generateName = uniqid() . '.' . $image->getClientOriginalExtension();
        $file = $image->storeAs('products', $generateName, 'public');

        $product = Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image_url' => $file
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Success add product',
            'data' => $product
        ], 201);
    }
}
