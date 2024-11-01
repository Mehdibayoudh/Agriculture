@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
        </section>
        <br><br><br><br>

        @include('Back.Event.form', [
            'event' => new \App\Models\Event,
            'route' => route('eventadmin.store'),
            'sponsors' => $sponsors ?? []
        ])
    </div>
@endsection
