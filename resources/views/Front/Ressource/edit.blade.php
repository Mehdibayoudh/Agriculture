@extends('layouts.app')

@section('content')
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <h2>Update Ressource</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index.html">Home</a></li>
            <li>/</li>
            <li><span>Update Ressource</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<div style="padding-top: 20px;">
    <a class="thm-btn" href="{{ route('ressource.index') }}">See Ressources</a>
</div>
<div style="display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        margin-top: 100px;
        margin-bottom: 100px;">
    <div style="    width: 800px;
        padding: 20px;
        border: solid thin #00000026;">

        <h2>Edit {{ $ressource->titre }}</h2>

        @include('Front.Ressource.form', ['ressource' => $ressource, 'route' => route('ressource.update', $ressource->id)])

    </div>
</div>
@endsection