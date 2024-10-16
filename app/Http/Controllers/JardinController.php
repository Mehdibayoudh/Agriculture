<?php

namespace App\Http\Controllers;

use App\Models\Jardin;
use Illuminate\Http\Request;

class JardinController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Fetch all jardins, optionally with relationships
        $jardins = Jardin::with('utilisateur')->get();

        // Return a view with the jardins
        return view('Front.garden.index', compact('jardins'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        // Return a view for creating a new jardin
        return view('Front.garden.create');
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
        ]);

        // Create a new jardin
        Jardin::create($request->all());

        // Redirect back to the index page with success message
        return redirect()->route('jardins.index')->with('success', 'Jardin created successfully.');
    }

    // Display the specified resource
    public function show(Jardin $jardin)
    {
        // Return a view showing the details of a specific jardin
        return view('Front.garden.show', compact('jardin'));
    }

    // Show the form for editing the specified resource
    public function edit(Jardin $jardin)
    {
        // Return a view for editing the selected jardin
        return view('Front.garden.edit', compact('jardin'));
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
