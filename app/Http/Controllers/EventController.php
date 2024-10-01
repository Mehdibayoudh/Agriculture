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
        return view('events.create');
    }

    /**
     * Store a newly created event in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'localisation' => 'required|string|max:255',
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Événement created successfully.');
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
        return view('events.edit', compact('event'));
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
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Événement updated successfully.');
    }

    /**
     * Remove the specified event from the database.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Événement deleted successfully.');
    }}
