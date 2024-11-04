<?php

namespace App\Http\Controllers;

use App\Models\Plante;
use App\Models\Jardin;
use App\Models\PlanteCategorie;
use Illuminate\Http\Request;

class PlanteController extends Controller
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
    public function index($jardinId)
    {
        $categories = PlanteCategorie::all();
        $plantes = Plante::where('jardin_id', $jardinId)->get();
        return view('Front.plante.index', compact(['plantes', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jardin = Jardin::find($id); 
        $categories = PlanteCategorie::all();
        return view('Front.plante.create', compact(['jardin', 'categories'])); // Return the form view for creating a new plante
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
            'besoins_eau' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required|exists:plante_categories,id',
            'jardin_id' => 'required|exists:jardins,id',
        ]);

        $plante = new Plante();
        $plante->nom = $request->nom;
        $plante->description = $request->description;
        $plante->besoins_eau = $request->besoins_eau;
        $plante->categorie_id = $request->categorie_id;
        $plante->jardin_id = $request->jardin_id;

        
        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move(public_path('uploads'), $imagename);
            $plante->image = $imagename;
        }

        $plante->save();
        return redirect()->route('listPlante', [$plante->jardin_id])->with('success', 'Plante created successfully.'); // Redirect with a success message
    }

    /**
     * Display the specified resource.
     *
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function show($jardinId, $planteId)
    {
        $plante = Plante::find(intval($planteId));
        return view('Front.plante.show', compact(['plante'])); // Return the show view for a specific plante
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function edit($jardinId, $planteId )
    {
        $plante = Plante::find(intval($planteId)); 
        $jardin = Jardin::find(intval($jardinId)); 
        $categories = PlanteCategorie::all();
        return view('Front.plante.edit', compact(['plante', 'jardin', 'categories'])); // Return the form view for editing a specific plante
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255', 
            'description' => 'required|string|max:255',
            'besoins_eau' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required|exists:plante_categories,id',
            'jardin_id' => 'required|exists:jardins,id',
        ]);

        $plante = Plante::find(intval($id));
        $plante->nom = $request->nom;
        $plante->description = $request->description;
        $plante->besoins_eau = $request->besoins_eau;
        $plante->categorie_id = $request->categorie_id;
        $plante->jardin_id = $request->jardin_id;

        
        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move(public_path('uploads'), $imagename);
            $plante->image = $imagename;
        }

        $plante->save();
        return redirect()->route('showPlante', [$plante->jardin_id, $id])->with('success', 'Plante updated successfully.'); // Redirect with a success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plante $plante)
    {
        $plante->delete(); // Delete the Plante instance
        return redirect()->route('listPlante', [$plante->jardin_id, $plante->_id])->with('success', 'Plante deleted successfully.'); // Redirect with a success message
    }
}
