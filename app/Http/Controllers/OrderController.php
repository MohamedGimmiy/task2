<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->paginate(5);
        $orders->transform(function ($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders',compact('orders'));
    }
    public function cart(){
        return view('cart');
    }
    public function addOrder(){
        return view('orders');
    }

    public function submitOrder(){

        $cart = session()->get('cart');

        Order::create(
            ['user_id' => auth()->user()->id,
            'cart' => serialize($cart)]);
        // product name we get it and qty then we add them to a session then convert it to cart obj
        session()->forget('cart');

        return redirect()->to('/orders');
    }

    public function remove_from_cart(Request $request){
        $items = session()->get('cart');

        unset($items[$request->id]);

        session()->put('cart', $items);
        return back();
    }
    public function add_to_cart(Request $request){

        $product = Product::where('name',$request->name)->first();
        // override
            $items = session()->has('cart')? session()->get('cart') : [];
            $items[$product->id]['price'] = $product->price;
            $items[$product->id]['name'] = $product->name;
            $items[$product->id]['qty'] = $request->qty;
            $items[$product->id]['total'] =(int) $product->price *(int) $request->qty;
            session()->put('cart',$items);
        return back();
    }

    public function getTotal($cart){
        $total = 0;
        foreach ($cart as $key => $item) {
            $total+= $item[$key]['total'];
        }
        return $total;
    }



}
