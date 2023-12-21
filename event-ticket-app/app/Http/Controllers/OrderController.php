<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = Order::all();

        return view('orders', ['orders' => $orders]);
    }
    public function insertOrder(Request $request)
    {
        $order = new Order;
        $order->username = $request->username;
        $order->event_title = $request->event_title;
        $order->event_id = $request->id;
        $order->price = $request->price;
        $order->size = $request->size;
        $order->save();
    
        return redirect()->back()->with('success', 'Order placed successfully');
    }
}
