<?php

namespace App\Http\Controllers\EventC;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        if ($request->has('generated_image')) { // Assuming 'generated_image' contains the file path
            $validatedData['image_url'] = $request->input('generated_image');
        }
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

        // Only update image_url if a new image URL is provided
        if ($request->filled('generated_image')) {
            $event->image_url = $request->input('generated_image');
        }

        // Update other event details with validated data
        $event->update($validatedData);

        // Sync sponsors if provided, or detach if not
        if (isset($validatedData['sponsors'])) {
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
    }
// In EventController.php
    public function generateImage(Request $request)
    {
        $title = $request->input('title');
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post('https://ai-text-to-image-generator-api.p.rapidapi.com/3D', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'x-rapidapi-key' => '5bfbaf133bmsh7271ae99c13a532p184f15jsn11fba1755b50',
                    'x-rapidapi-host' => 'ai-text-to-image-generator-api.p.rapidapi.com'
                ],
                'json' => [
                    'inputs' => $title,  // Use the title from the request as the input text
                ],
            ]);

            // Decode the JSON response
            $data = json_decode($response->getBody(), true);

            // Check if 'url' key exists in the response data
            if (isset($data['url'])) {
                return response()->json(['url' => $data['url']]); // Return the URL in JSON format
            } else {
                return response()->json(['error' => 'Image URL not found in the response.'], 500);
            }

        } catch (\Exception $e) {
            \Log::error('API Request Failed:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error generating image.'], 500);
        }
    }



}
