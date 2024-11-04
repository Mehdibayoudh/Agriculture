<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorAdminController extends Controller
{
    /**
     * Display a listing of the sponsors.
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('Back.Sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new sponsor.
     */
    public function create()
    {
        return view('Back.Sponsor.create');
    }

    /**
     * Store a newly created sponsor in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'phone' => 'required|string|max:20', // Adjust validation as needed
        ]);

        Sponsor::create($validatedData);

        return redirect()->route('sponsoradmin.index')->with('success', 'Sponsor created successfully.');
    }

    /**
     * Display the specified sponsor.
     */
    public function show(Sponsor $sponsor)
    {
        return view('Back.Sponsor.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified sponsor.
     */
    public function edit($id)
    {
        $sponsor=Sponsor::find($id);
        return view('Back.Sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified sponsor in the database.
     */
    public function update(Request $request,  $sponsor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
        $sponsor = Sponsor::findOrFail($sponsor);

        $sponsor->update($validatedData);

        return redirect()->route('sponsoradmin.index')->with('success', 'Sponsor updated successfully.');
    }

    /**
     * Remove the specified sponsor from the database.
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $sponsor->delete();

        return redirect()->route('sponsoradmin.index')->with('success', 'Sponsor deleted successfully.');
    }
}
