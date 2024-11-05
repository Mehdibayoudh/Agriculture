<?php

namespace App\Http\Controllers\WishlistC;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Ressource;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Display a list of wishlists
    public function index()
    {
        $Wishlists = Wishlist::with('ressources')->get(); // Get all wishlists with resources
        return view('Front.Wishlist.index', compact('Wishlists'));
    }

    public function show(Wishlist $wishlist)
    {
        $wishlist->load('ressources');

        return view('Front.Wishlist.show', compact('wishlist'));
    }
    public function create()
    {
        return view('Front.Wishlist.create');
    }

    // Create a new wishlist
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id'
        ]);
        //hard coding user for now
        $data = $request->all();
        $data['user_id'] = 1;

        Wishlist::create($data);
        return redirect()->route('wishlists.index')->with('success', 'wishlist created successfully.');
    }


    public function edit(Wishlist $wishlist)
    {
        return view('Front.Wishlist.edit', compact('wishlist'));
    }
    // Update a wishlist
    public function update(Request $request, Wishlist $wishlist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $wishlist->update($data);

        return redirect()->route('wishlists.index')->with('success', 'Ressource updated successfully.');
    }

    // Delete a wishlist
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->route('wishlists.index')->with('success', 'Ressource deleted successfully.');
    }

    public function addRessource(Request $request, $ressourceId)
    {
        // Validate that a wishlist was selected
        $request->validate([
            'wishlist_id' => 'required|exists:wishlists,id', // Ensure the wishlist exists
        ]);

        // Retrieve the selected wishlist
        $wishlistId = $request->input('wishlist_id');
        $wishlist = Wishlist::find($wishlistId);

        // Assuming you have a relation set up for ressources in Wishlist
        if ($wishlist) {
            $wishlist->ressources()->attach($ressourceId); // Add the resource to the selected wishlist
            return redirect()->back()->with('success', 'Resource added to your wishlist!');
        }

        return redirect()->back()->with('error', 'Could not add resource to wishlist.');
    }


    public function detachRessource(Wishlist $wishlist, Ressource $ressource)
    {
        // Detach the ressource from the wishlist
        $wishlist->ressources()->detach($ressource->id);

        // Optionally, you can add a success message
        return redirect()->route('wishlists.show', $wishlist->id)->with('success', 'Resource removed from wishlist');
    }
}
