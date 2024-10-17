<?php

namespace App\Http\Controllers\EventC;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('Back.Event.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('Back.Event.create');
    }

    /**
     * Store a newly created event in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',  // Made description optional
            'date' => 'required|date',  // Ensure date is in correct format
            'localisation' => 'required|string|max:255',
        ]);
        $validatedData['utilisateur_id'] = 1; // Set static user ID to 1

        // Create the event using validated data
        Event::create($validatedData);

        // Redirect back with success message
        return redirect()->route('eventadmin.index');
    }


    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('Back.Event.edit', compact('event'));
    }


    /**
     * Update the specified event in the database.
     */
    public function update(Request $request, $event)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'localisation' => 'required|string|max:255',
        ]);
        $events = Event::findOrFail($event);

        $events->update($request->all());

        return redirect()->route('eventadmin.index');
    }

    /**
     * Remove the specified event from the database.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('eventadmin.index');
    }
}
