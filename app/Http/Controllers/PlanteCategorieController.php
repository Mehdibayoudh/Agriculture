<?php

namespace App\Http\Controllers;

use App\Models\PlanteCategorie;
use App\Models\Jardin;
use Illuminate\Http\Request;

class PlanteCategorieController extends Controller
{
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planteCategories = PlanteCategorie::all(); // Retrieve all PlanteCategorie records
        return view('Back.PlanteCategorie.index', compact('planteCategories')); // Return to the index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.PlanteCategorie.create'); // Return the form view for creating a new PlanteCategorie
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type_sol' => 'required|string|max:255',
            'cycle_de_vie' => 'required|string|max:255',
            'utilisation' => 'required|string|max:255',
            'maladies_courantes' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $categorie = new PlanteCategorie();
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        $categorie->type_sol = $request->type_sol;
        $categorie->cycle_de_vie = $request->cycle_de_vie;
        $categorie->utilisation = $request->utilisation;
        $categorie->maladies_courantes = $request->maladies_courantes;
        

        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move(public_path('uploads'), $imagename);
            $categorie->image = $imagename;
        }

        $categorie->save();

        return redirect()->route('planteCategorie.index')->with('success', 'PlanteCategorie created successfully.'); // Redirect with a success message
    }

    /**
     * Display the specified resource.
     *
     * @param  PlanteCategorie  $PlanteCategorie
     * @return \Illuminate\Http\Response
     */
    public function show($categorieId)
    {
        $planteCategorie = PlanteCategorie::find(intval($categorieId));
        return view('Front.PlanteCategorie.show', compact('planteCategorie')); // Return the show view for a specific PlanteCategorie
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PlanteCategorie  $PlanteCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanteCategorie $planteCategorie)
    {
        return view('Back.PlanteCategorie.edit', compact(['planteCategorie'])); // Return the form view for editing a specific PlanteCategorie
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PlanteCategorie  $PlanteCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type_sol' => 'required|string|max:255',
            'cycle_de_vie' => 'required|string|max:255',
            'utilisation' => 'required|string|max:255',
            'maladies_courantes' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        


        $categorie = PlanteCategorie::find(intval($id));
        $categorie->nom = "$request->nom";
        $categorie->description = $request->description;
        $categorie->type_sol = $request->type_sol;
        $categorie->cycle_de_vie = $request->cycle_de_vie;
        $categorie->utilisation = $request->utilisation;
        $categorie->maladies_courantes = $request->maladies_courantes;

        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move(public_path('uploads'),$imagename);
            $categorie->image = $imagename;
        }

        $categorie->save(); // Update the PlanteCategorie instance
        return redirect()->route('planteCategorie.index')->with('success', 'PlanteCategorie updated successfully.'); // Redirect with a success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PlanteCategorie  $PlanteCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanteCategorie $planteCategorie)
    {
        $planteCategorie->delete(); // Delete the PlanteCategorie instance
        return redirect()->route('planteCategorie.index')->with('success', 'PlanteCategorie deleted successfully.'); // Redirect with a success message
    }
}
