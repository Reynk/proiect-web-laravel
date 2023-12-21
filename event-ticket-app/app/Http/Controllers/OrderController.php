<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = Order::where('username', auth()->user()->username)->get();

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

    public function handlePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $request->price * 100, // Stripe expects amounts in cents
                'currency' => 'usd',
                'description' => 'Ticket for ' . $request->event_title,
                'source' => $request->stripeToken,
            ]);

            // Handle post-payment actions like saving the order in your database
            return redirect()->route('orders')->with('success', 'Payment successful!');
        } catch (\Exception $ex) {
            return redirect()->route('tickets')->with('error', $ex->getMessage());
        }
    }
}
