@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>

            <div class="container">
                <h2>Events</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><span>Edit Event</span></li>
                </ul>
            </div>
        </section>
        @include('Back.Event.form', ['event' => $event, 'route' => route('eventadmin.update', $event)])
    </div>
@endsection
