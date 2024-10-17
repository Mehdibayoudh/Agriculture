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
            'type' => 'required|string|max:255',
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
        return redirect()->route('jardins.index');
    }

    // Display the specified resource
    public function show(Jardin $garden)
    {
        // Return a view showing the details of a specific jardin
        return view('Front.garden.gardenDetails', compact('garden'));
    }

    // Show the form for editing the specified resource
    public function edit(Jardin $jardin)
    {
        $conectedJardinier=2;
        // Return a view for editing the selected jardin
        return view('Front.garden.edit', compact('jardin'),compact('conectedJardinier'));
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

        // Update the jardin with new data
        $jardin->update($request->all());

        // Redirect back to the index page with success message
        return redirect()->route('jardins.index')->with('success', 'Jardin updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Jardin $jardin)
    {
        // Delete the selected jardin
        $jardin->delete();

        // Redirect back to the index page with success message
        return redirect()->route('jardins.index')->with('success', 'Jardin deleted successfully.');
    }
}
