<?php

namespace App\Http\Controllers\jardins;

use App\Http\Controllers\Controller;
use App\Models\Jardin;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class JardinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all jardins with the average rating of reviews
        $jardins = Jardin::withAvg('reviews', 'rating')->get();

        // Return a view with the jardins and their average ratings
        return view('Front.garden.index', compact('jardins'));
    }



    public function search(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->input('search');

        // Perform the search on the gardens' name and description (or any other relevant columns)
        $jardins = Jardin::where('nom', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        // Return the view with the search results
        return view('Front.garden.index', compact('jardins'));
    }


    public function storeReview(Request $request)
    {

        $request->validate([
            'jardin_id' => 'required|exists:jardins,id',
            'comment' => 'required|string|max:500',
        ]);

        $jardinId = $request->input('jardin_id');

        $user = Auth::user();
        $userId = $user->id;

        // Check if the user has already reviewed this garden
        $existingReview = Review::where('jardin_id', $jardinId)
            ->where('user_id', $userId)
            ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'You have already reviewed this garden.');
        }

        // Create a new review
        Review::create([
            'jardin_id' => $jardinId,
            'user_id' => $userId,
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating') ?? 5, // Default rating if not selected
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted.');
    }


    public function caption(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'photo' => 'required|file|image'
        ]);

        try {
            // Get the uploaded file from the request
            $file = $request->file('photo');  // Use 'photo' here as it matches the form input name

            // Send a POST request with the file to the FastAPI endpoint
            $response = Http::attach(
                'file',                        // The field name expected by FastAPI
                file_get_contents($file),      // The file content
                $file->getClientOriginalName() // Original file name
            )->post('http://127.0.0.1:8081/caption');
            // Check if the request was successful
            if ($response->successful()) {
                $caption = $response->json('caption');
                log::info('Returning caption:', ['caption' => $caption]);

                return response()->json([
                    'caption' => $caption
                ]);
            }
            else {
                // Handle error response from FastAPI
                return response()->json([
                    'error' => 'Failed to get caption from the FastAPI server.'
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json([
                'error' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function jardinierGardens(Request $request)
    {
        $user = Auth::user();
        $conectedJardinier = $user->id;

        // Get the filter for etat from the request, default is null (no filter)
        $etat = $request->input('etat');

        // Query the gardens based on the 'etat' filter
        $query = Jardin::where('utilisateur_id', $conectedJardinier);

        if (!is_null($etat)) {
            $query->where('etat', $etat); // Filter by etat if set
        }

        // Fetch jardins with the average review rating for each
        $jardins = $query->withAvg('reviews', 'rating')->get(); // Add the average review rating for each garden

        // Return a view with the filtered gardens
        return view('Front.garden.jardinierGardens', compact('jardins', 'conectedJardinier', 'etat'));
    }



    // Show the form for creating a new resource
    public function create()
    {
        // Return a view for creating a new jardin
        $user = Auth::user();
        $conectedJardinier = $user->id;
        return view('Front.garden.create',compact('conectedJardinier'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:10|max:500',
            'localisation' => 'required|string|min:3|max:255',
            'type' => ['required', 'in:' . implode(',', Jardin::GARDEN_TYPES)],
            'surface' => 'required|numeric|min:10|max:10000',
            'utilisateur_id' => 'required|exists:users,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('jardin', 'public');
            //log::info('Image uploaded to: ' . $imagePath);
        }

        // Create a new jardin with image path
        Jardin::create([
            'nom' => $request->nom,
            'localisation' => $request->localisation,
            'type' => $request->type,
            'description' => $request->description,
            'surface' => $request->surface,
            'utilisateur_id' => $request->utilisateur_id,
            'photo' => $imagePath, // Save the image path
        ]);

        // Redirect back to the index page with success message
        return redirect()->route('getJardinierGardens', ['etat' => 0])->with('success', 'Jardin created successfully.');
    }

    // Display the specified resource
    public function show(Jardin $jardin)
    {
        // Calculer la moyenne des évaluations pour ce jardin
        $averageRating = $jardin->reviews()->avg('rating') ?? 0; // Retourne 0 si aucune évaluation

        // Retourner la vue avec les détails du jardin et la moyenne des évaluations
        return view('Front.garden.gardenDetails', compact('jardin', 'averageRating'));
    }


    // Show the form for editing the specified resource
    public function edit(Jardin $jardin)
    {
        $user = Auth::user();
        $conectedJardinier = $user->id;
        // Return a view for editing the selected jardin
        return view('Front.garden.edit', compact('jardin','conectedJardinier'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Jardin $jardin)
    {
        // Validate the incoming request
        $request->validate([
            'nom' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'surface' => 'required|numeric',
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        // Update the jardin with new data except 'etat'
        $data = $request->all();
        $data['etat'] = 0;

        $jardin->update($data);

        // Redirect back to the index page with success message
        return redirect()->route('getJardinierGardens', ['etat' => 0])->with('success', 'Jardin updated successfully, and is now pending approval.');
    }

    // Remove the specified resource from storage
    public function destroy(Jardin $jardin)
    {
        // Delete the selected jardin
        $etat = $jardin->etat;
        $jardin->delete();

        // Redirect back to the index page with success message
        return redirect()->route('getJardinierGardens', ['etat' => $etat])->with('success', 'Jardin deleted successfully.');
    }
}
