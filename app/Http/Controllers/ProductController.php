<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
// Get All Products
public function index()
{
$products = Product::all();
return response()->json($products);
}

// Get Single Product
public function show($id)
{
$product = Product::find($id);
if ($product) {
return response()->json($product);
}
return response()->json(['message' => 'Product not found'], 404);
}
// Create New Product
public function store(Request $request)
{
$product = Product::create($request->all());
return response()->json($product, 201);
}

// Update Product
public function update(Request $request, $id)
{
$product = Product::find($id);
if ($product) {
$product->update($request->all());
return response()->json($product);
}
return response()->json(['message' => 'Product not found'], 404);
}

// Delete Product
public function destroy($id)
{
$product = Product::find($id);
if ($product) {
$product->delete();
return response()->json(['message' => 'Product deleted']);
}
return response()->json(['message' => 'Product not found'], 404);
}
}