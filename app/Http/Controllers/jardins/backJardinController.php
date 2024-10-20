<?php

namespace App\Http\Controllers\jardins;

use App\Http\Controllers\Controller;
use App\Models\Jardin;
use Illuminate\Http\Request;

class backJardinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all jardins, optionally with relationships
        $jardins = Jardin::with('utilisateur')->get();

        // Return a view with the jardins
        return view('Back.garden.admin', compact('jardins'));
    }

    public function accept($id)
    {
        $jardin = Jardin::findOrFail($id);
        $jardin->etat = 1;
        $jardin->save();

        return redirect()->route('jardinBack.index')->with('success', 'Jardin accepted successfully.');
    }

    public function decline($id)
    {
        $jardin = Jardin::findOrFail($id);
        $jardin->etat = -1;
        $jardin->save();

        return redirect()->route('jardinBack.index')->with('success', 'Jardin declined successfully.');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
