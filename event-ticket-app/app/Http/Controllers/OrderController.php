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
    $validatedData = $request->validate([
        'username' => 'required',
        'event_title' => 'required',
        'event_id' => 'required',
        'price' => 'required',
        'size' => 'required',
    ]);

    $username = $validatedData['username'];
    $event_title = $validatedData['event_title'];
    $event_id = $validatedData['id'];
    $price = $validatedData['price'];
    $size = $validatedData['size'];

    $price = $price * $size;

    $order = new Order([
        'username' => $username,
        'event_title' => $event_title,
        'event_id' => $event_id,
        'price' => $price,
        'size' => $size,
    ]);

    $order->save();

    return redirect('order');
}
}
