<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function fetchAll()
    {
        $ressources = Ressource::all();
        return response()->json($ressources);
    }

    public function fetchById($id)
    {
        $ressource = Ressource::find($id);

        if (!$ressource) {
            return response()->json(['message' => 'Ressource not found'], 404);
        }

        return response()->json($ressource);
    }

    public function createRessource(Request $request)
    {
        // Validate the request
        $request->validate([
            'type' => 'required|string',
            'disponibilité' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if type is valid
        if (!Ressource::isValidType($request->type)) {
            return redirect()->back()->withErrors(['type' => 'Invalid type selected.']);
        }

        // Check if disponibilité is valid
        if (!Ressource::isValidDisponibilite($request->disponibilité)) {
            return redirect()->back()->withErrors(['disponibilité' => 'Invalid availability selected.']);
        }

        Ressource::create($request->all());

        return redirect()->route('ressources.index')->with('success', 'Ressource created successfully.');
    }

    public function updateRessource(Request $request, Ressource $ressource)
    {
        $request->validate([
            'type' => 'required|string',
            'disponibilité' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        if (!Ressource::isValidType($request->type)) {
            return redirect()->back()->withErrors(['type' => 'Invalid type selected.']);
        }

        if (!Ressource::isValidDisponibilite($request->disponibilité)) {
            return redirect()->back()->withErrors(['disponibilité' => 'Invalid availability selected.']);
        }

        $ressource->update($request->all());

        return redirect()->route('ressources.index')->with('success', 'Ressource updated successfully.');
    }

    public function deleteRessource($id)
    {
        $ressource = Ressource::find($id);

        if (!$ressource) {
            return response()->json(['message' => 'Ressource not found'], 404);
        }

        $ressource->delete();

        return response()->json(['message' => 'Ressource deleted successfully']);
    }
}
