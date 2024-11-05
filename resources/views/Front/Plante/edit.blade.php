@extends('layouts.app')

@section('content')
    <div class="container my-4">
         @include('Front.Plante.form', ['plante' => $plante, 'route' => route('plante.update', $plante->id)])
    </div>
@endsection
