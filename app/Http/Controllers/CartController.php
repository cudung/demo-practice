<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    //

    public function addCart(CartRequest $request) {
        $user = Auth::user();
        $cart = Cart::where(['user_id' => $user->id])->first();
        
        if (empty($cart)) {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
            
        } 
        $order = Order::where('cart_id', $cart->id)
                        ->where('product_id', $request->product_id)->first();
        if (empty($order)) {
            $order = Order::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quality' => $request->quality
            ]);
        } else {
           
            $order->update([
                'quality' => $order->quality + $request->quality 
            ]);
        }
        
        $response = [
            'message' => 'Add Cart Complete',
            'data' => [
                'user' => $user,
                'order' => $order
            ]
        ];
        
        return response()->json($response, 201);

    }
}
