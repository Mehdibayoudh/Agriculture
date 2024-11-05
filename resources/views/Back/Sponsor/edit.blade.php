@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <h2>Edit Sponsor</h2>
        @include('Back.Sponsor.form', ['sponsor' => $sponsor, 'route' => route('sponsoradmin.update', $sponsor), 'method' => 'PUT'])
    </div>
@endsection
