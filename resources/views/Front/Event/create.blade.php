@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2>Events</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><span>Create New Event</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

         @include('Front.Event.form', ['event' => new \App\Models\Event, 'route' => route('Front.Event.store')])
    </div>
@endsection
