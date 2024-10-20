<?php

namespace App\Http\Controllers\jardins;

use App\Http\Controllers\Controller;
use App\Models\Jardin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class JardinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    public function index()
    {
        // Fetch all jardins, optionally with relationships
        $jardins = Jardin::all();

        // Return a view with the jardins
        return view('Front.garden.index', compact('jardins'));
    }

    public function jardinierGardens(Request $request)
    {
        $conectedJardinier = 2;

        // Get the filter for etat from the request, default is null (no filter)
        $etat = $request->input('etat');

        // Query the gardens based on the 'etat' filter
        $query = Jardin::where('utilisateur_id', $conectedJardinier);

        if (!is_null($etat)) {
            $query->where('etat', $etat); // Filter by etat if set
        }

        $jardins = $query->get();

        // Return a view with the filtered gardens
        return view('Front.garden.jardinierGardens', compact('jardins', 'conectedJardinier', 'etat'));
    }



    // Show the form for creating a new resource
    public function create()
    {
        // Return a view for creating a new jardin
        $conectedJardinier=2;
        return view('Front.garden.create',compact('conectedJardinier'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'nom' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'type' => ['required', 'in:' . implode(',', Jardin::GARDEN_TYPES)], // Enum validation from array
            'surface' => 'required|numeric',
            'utilisateur_id' => 'required|exists:users,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        //$jardin->load('utilisateur'); // Eager load the utilisateur relationship

        // Return a view showing the details of a specific jardin
        return view('Front.garden.gardenDetails', compact('jardin'));
    }


    // Show the form for editing the specified resource
    public function edit(Jardin $jardin)
    {
        $conectedJardinier=2;
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
