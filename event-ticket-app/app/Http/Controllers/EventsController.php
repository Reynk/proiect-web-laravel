<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function showEvents()
    {
        $events = Event::all();

        return view('tickets', ['events' => $events]);
    }
    public function createEvent(Request $request)
    {   
        $validatedData = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'about' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
        }
    
        $event = new Event([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'about' => $validatedData['about'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image' => $imageName,
        ]);
    
        $event->save();
    
        return redirect()->route('adminPage')->with('message', 'Event created successfully!');
    
    }
    public function update(Request $request, $id)
    {
        // Validate and update the event.
    }
}