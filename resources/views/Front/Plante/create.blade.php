@extends('layouts.app')

@section('content')
    <div class="container my-4">
         @include('Front.Plante.form', ['jardin' => $jardin, 'plante' => new \App\Models\Plante, 'route' => route('plante.store')])
    </div>
@endsection
