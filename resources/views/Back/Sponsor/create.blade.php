@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <h2>Add Sponsor</h2>
        @include('Back.Sponsor.form', ['sponsor' => new \App\Models\Sponsor, 'route' => route('sponsoradmin.store'), 'method' => 'POST'])
    </div>
@endsection
