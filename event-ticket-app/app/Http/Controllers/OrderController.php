<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function order()
    {
        if (auth()->check()) {
            $orders = Order::with('event')->where('user_id', auth()->id())->get();
            return view('order', ['orders' => $orders]);
        } else {
            return redirect('login');
        }
    }
}
