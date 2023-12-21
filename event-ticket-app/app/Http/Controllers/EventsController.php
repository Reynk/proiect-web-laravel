<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class EventsController extends Controller
{
    public function showEvents()
    {
        // dd(Auth::user());

        $events = Event::all();
        $username = Auth::user()->username; // Get the username of the currently authenticated user

        return view('tickets', ['events' => $events, 'username' => $username]);

    }

    public function showEventInfo($id)
    {
        $event = Event::findOrFail($id);

        return view('eventInfo', ['event' => $event]);
    }
    public function createEvent(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'about' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            // 'image' => 'nullable|image',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $event = new Event([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'about' => $validatedData['about'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            // 'image' => $imageName,
        ]);

        $event->save();

        return redirect()->route('adminPage')->with('message', 'Event created successfully!');

    }
    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($request->has('title')) {
            $event->title = $request->input('title');
        }
        if ($request->has('date')) {
            $event->date = $request->input('date');
        }
        if ($request->has('about')) {
            $event->about = $request->input('about');
        }
        if ($request->has('description')) {
            $event->description = $request->input('description');
        }
        if ($request->has('price')) {
            $event->price = $request->input('price');
        }
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $event->image = $imageName;
        }

        $event->save();

        return redirect()->route('adminPage')->with('message', 'Event updated successfully!');

    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('adminPage')->with('message', 'Event deleted successfully!');
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