@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit {{ $plante->nom }}</h2>
         @include('Front.Plante.form', ['plante' => $plante, 'route' => route('plante.update', $plante->id)])
    </div>
@endsection
