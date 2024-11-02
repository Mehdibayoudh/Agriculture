@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="mb-4 d-flex" style="align-items: baseline; justify-content: space-between">
            <h2>Details de la plante {{ $plante->nom }} </h2>
            <div class="d-flex gap-3">
                <a href="{{ route('editPlante', [$plante->jardin_id, $plante->id]) }}"><button class="btn btn-outline-success" style="margin-left: 10px; font-size: 16px;" type="submit">Edit Plante</button></a>
                <form action="{{ route('plante.destroy', $plante->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" style="margin-left: 10px; font-size: 16px;" type="submit">Supprimer</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <img style="width: 350px" src="{{ $plante->image ? URL::asset('/uploads/' . $plante->image) : URL::asset('/uploads/' . "defaultPlante.jpg") }}" alt="{{ $plante->nom }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h4>Description</h4>
                <p>{{ $plante->description }}</p>

                <div class="d-flex " style="align-items: baseline; gap:10px;">
                    <h4>Besoin en eau :</h4>
                    <p ><span style="font-size: 24px; margin-right: 7px">{{ $plante->besoins_eau }}</span> L/Jour</p>
                </div>


                <div class="d-flex " style="align-items: baseline; gap:10px;">
                    <h4 style="width: 150px">Catégorie :</h4>
                    <p style=" width: 150px; font-size: 24px; margin-right: 7px">{{ $plante->categorie->nom }}</p>
                    <a href="{{ route('planteCategorie.show', [$plante->categorie_id]) }}"><button class="btn btn-outline-primary btn-sm" style="margin-left: 10px; font-size: 16px;" type="submit">Voir plus</button></a>
                </div>
                
                <div class="d-flex " style="align-items: baseline; gap:10px;">
                    <h4 style="width: 150px">Jardin :</h4>
                    <p style=" width: 150px; font-size: 24px; margin-right: 7px">{{ $plante->jardin->nom }}</p>
                    <a href="{{ route('jardins.show', [$plante->jardin_id]) }}"><button class="btn btn-outline-primary btn-sm" style="margin-left: 10px; font-size: 16px;" type="submit">Voir plus</button></a>
                </div>
            </div>
        </div>

    </div>
@endsection
