<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $events = Event::all();
        return view('Front.Event.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('Front.Event.create');
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
        return redirect()->route('Front.Event.index');
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
    public function edit(Event $event)
    {
        return view('Front.Event.edit', compact('event'));
    }

    /**
     * Update the specified event in the database.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'localisation' => 'required|string|max:255',
        ]);
        $event->update($request->all());

        return redirect()->route('Front.Event.index');
    }

    /**
     * Remove the specified event from the database.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('Front.Event.index');
    }}
