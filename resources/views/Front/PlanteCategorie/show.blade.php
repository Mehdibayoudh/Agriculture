@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="mb-4">
            <h2>Details de la categorie {{ $planteCategorie->nom }} </h2>
        </div>


        <div class="row">
            <div class="col-md-6">
                <img src="{{ $planteCategorie->image ? URL::asset('/uploads/' . $planteCategorie->image) : URL::asset('/uploads/' . "defaultPlante.jpg") }}" alt="{{ $planteCategorie->nom }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h4>Description</h4>
                <p>{{ $planteCategorie->description }}</p>

                <div class="d-flex " style="align-items: baseline; gap:10px;">
                    <h4 style="width: 170px">Type de sol :</h4>
                    <p style=" width: 150px; font-size: 24px; margin-right: 7px">{{ $planteCategorie->type_sol }}</p>
                </div>


                <div class="d-flex " style="align-items: baseline; gap:10px;">
                    <h4 style="width: 170px">Cycle de vie :</h4>
                    <p style=" width: 150px; font-size: 24px; margin-right: 7px">{{ $planteCategorie->cycle_de_vie }}</p>
                </div>
                
                <div class="d-flex " style="align-items: baseline; gap:10px;">
                    <h4 style="width: 170px">Utilisation :</h4>
                    <p style=" width: 150px; font-size: 24px; margin-right: 7px">{{ $planteCategorie->utilisation }}</p>
                </div>

                <h4>Maladies communes</h4>
                <p>{{ $planteCategorie->maladies_courantes }}</p>
            </div>
        </div>

    </div>
@endsection
