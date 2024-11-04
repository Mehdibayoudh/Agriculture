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
    public function show($id)
    {
        $event = Event::with('sponsors', 'user')->findOrFail($id);
        return view('Front.Event.show', compact('event'));
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
    public function participate(Event $event)
    {
        $user = auth()->user();

        // Check if the user is already participating in this event
        if ($event->participants()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('message', 'You are already participating in this event.');
        }

        // Add the user to the event's participants
        $event->participants()->attach($user->id);

        return redirect()->back()->with('message', 'You have successfully registered for the event.');
    }


}
