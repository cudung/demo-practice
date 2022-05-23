<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function show() {
        $products = Product::all();
        return response()->json($products);
    }

    public function del(Request $request) {
        $product = Product::where(['id' => $request->id])->first();
        if(empty($product)) {
            $response = [
                'message' => 'Product not exist',
                'data' => '',
                'code' => 401
            ];
        } else {
            $product->delete();
            $response = [
                'message' => 'Delete Complete',
                'data' => $product,
                'code' => 200
            ];
        }
        return response()->json($response, $response['code']);
    }

    public function add(ProductRequest $request) {
        $product = Product::create($request->all());
        
        return response()->json([
            'message' => 'Add Product Complete',
            'data' => $product,
        ],201);
    }

    public function update(ProductRequest $request, $id) {
        $product = Product::where(['id' => $id])->first();
        if(empty($product)) {
            $response = [
                'message' => 'Product not exist',
                'data' => '',
                'code' => 401
            ];
            
        } else {
            $update = $product->update($request->all());
            $response = [
                'message' => 'Update Complete',
                'data' => $product,
                'code' => 200
            ];
            
        }
        return response()->json($response, $response['code']);
    }
}
