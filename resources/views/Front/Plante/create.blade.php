@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Plante</h2>
         @include('Front.Plante.form', ['plante' => new \App\Models\Plante, 'route' => route('plante.store')])
    </div>
@endsection
