@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2>Jardin</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/jardins') }}">Home</a></li>
                    <li>/</li>
                    <li><span>Create New Garden</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        @include('Front.garden.form', ['jardin' => new \App\Models\Jardin,'user'=>$conectedJardinier, 'route' => route('jardins.store')])
    </div>
@endsection
