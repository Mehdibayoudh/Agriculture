<?php

namespace App\Http\Controllers\EventC;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sponsor;
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
        $events = Event::with('sponsors')->get();
        return view('Back.Event.index', compact('events'));
    }


    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        $sponsors = Sponsor::all();
        return view('Back.Event.create', compact('sponsors'));    }

    /**
     * Store a newly created event in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data with stricter rules
        $validatedData = $request->validate([
            'titre' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\-]+$/u' // Ensure title contains only letters, spaces, and hyphens
            ],
            'description' => 'nullable|string|max:1000',
            'date' => 'required|date|after:today',
            'localisation' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'exists:sponsors,id',
        ], [
            // Custom error messages
            'titre.required' => 'Le titre est obligatoire.',
            'titre.regex' => 'Le titre ne doit contenir que des lettres, espaces, ou tirets.',
            'date.required' => 'La date est obligatoire.',
            'date.after' => 'La date doit être une date future.',
            'localisation.required' => 'La localisation est obligatoire.',
            'localisation.regex' => 'La localisation ne doit contenir que des lettres, espaces, ou tirets.',
        ]);

        $validatedData['utilisateur_id'] = 1;

        $event = Event::create($validatedData);

        if(isset($validatedData['sponsors'])) {
            $event->sponsors()->attach($validatedData['sponsors']);
        }

        return redirect()->route('eventadmin.index')->with('success', 'L\'événement a été créé avec succès.');
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
        $sponsors = Sponsor::all();
        return view('Back.Event.edit', compact('event', 'sponsors'));
    }


    /**
     * Update the specified event in the database.
     */
    public function update(Request $request, $event)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'localisation' => 'required|string|max:255',
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'exists:sponsors,id',
        ]);

        $event = Event::findOrFail($event);
        $event->update($validatedData);

        if(isset($validatedData['sponsors'])) {
            $event->sponsors()->sync($validatedData['sponsors']);
        } else {
            $event->sponsors()->detach();
        }

        return redirect()->route('eventadmin.index')->with('success', 'L\'événement a été mis à jour avec succès.');
    }

    /**
     * Remove the specified event from the database.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('eventadmin.index');
    }}
