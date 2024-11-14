<?php

namespace App\Http\Controllers\RessourceC;

use App\Http\Controllers\Controller;
use App\Models\Ressource;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RessourceController extends Controller
{
    /**
     * Display a listing of the ressources.
     */

    public function index()
    {
        $user = Auth::user();
        $conecteduser = $user->id;
        $Ressources = Ressource::all();

        // Fetch the authenticated user's wishlists
        // $wishlists = Wishlist::where('user_id', auth()->id())->get();
        $wishlists = Wishlist::where('user_id', $conecteduser)->get();
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
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            // 'user_id' => 'required|exists:users,id',

        ]);
        $user = Auth::user();
        $conecteduser = $user->id;
        $data = $request->all();
        $data['user_id'] = $conecteduser;

        //image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath; // Save the path in the database
        }


        Ressource::create($data);

        return redirect()->back()->with('success', 'Your review has been submitted.');
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
