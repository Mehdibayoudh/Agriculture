<?php

namespace App\Http\Controllers\EventC;

use App\Http\Controllers\Controller;
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
     }

    /**
     * Store a newly created event in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data

    }


    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
     }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
     }

    /**
     * Update the specified event in the database.
     */
    public function update(Request $request, Event $event)
    {

    }

    /**
     * Remove the specified event from the database.
     */
    public function destroy(Event $event)
    {

    }
}
