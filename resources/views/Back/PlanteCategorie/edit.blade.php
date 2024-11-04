@extends('layouts_Admin.app')

@section('content')
    <div class="container-fluid">
        @include('Back.PlanteCategorie.form', ['planteCategorie' => $planteCategorie, 'route' => route('planteCategorie.update', $planteCategorie->id)])
    </div>
@endsection
