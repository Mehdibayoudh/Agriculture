@extends('layouts_Admin.app')

@section('content')
    <div class="container-fluid">
        @include('Back.PlanteCategorie.form', ['planteCategorie' => new \App\Models\PlanteCategorie, 'route' => route('planteCategorie.store')])
    </div>
@endsection
