<?php

namespace App\Http\Controllers\RessourceC;

use App\Http\Controllers\Controller;
use App\Models\Ressource;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the ressources.
     */

    public function index()
    {
        $Ressources = Ressource::all();

        // Fetch the authenticated user's wishlists
        // $wishlists = Wishlist::where('user_id', auth()->id())->get();
        $wishlists = Wishlist::where('user_id', 1)->get();
        return view('Front.Ressource.index', compact('Ressources', 'wishlists'));
    }

    /**
     * Show the form for creating a new ressource.
     */
    public function create()
    {
        return view('Front.Ressource.create');
    }

    /**
     * Store a newly created ressource in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'disponibilité' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            // 'user_id' => 'required|exists:users,id',

        ]);
        //hard coding user for now
        $data = $request->all();
        $data['user_id'] = 1;

        //image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath; // Save the path in the database
        }


        Ressource::create($data);

        return redirect()->route('ressource.index')->with('success', 'Ressource created successfully.');
    }

    /**
     * Display the specified ressource.
     */
    public function show(Ressource $ressource)
    {
        return view('Front.Ressource.show', compact('ressource'));
    }

    /**
     * Show the form for editing the specified ressource.
     */
    public function edit(Ressource $ressource)
    {
        return view('Front.Ressource.edit', compact('ressource'));
    }

    /**
     * Update the specified ressource in the database.
     */
    public function update(Request $request, Ressource $ressource)
    {

        $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'disponibilité' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $data = $request->all();

        //image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath; // Save the path in the database
        }






        $ressource->update($data);

        return redirect()->route('ressource.index')->with('success', 'Ressource updated successfully.');
    }

    /**
     * Remove the specified ressource from the database.
     */
    public function destroy(Ressource $ressource)
    {

        $ressource->delete();

        return redirect()->route('ressource.index')->with('success', 'Ressource deleted successfully.');
    }
}
