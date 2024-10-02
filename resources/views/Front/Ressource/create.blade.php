@extends('layouts.app')

@section('content')
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <h2>Create Ressource</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index.html">Home</a></li>
            <li>/</li>
            <li><span>Create Ressource</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<div style="display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        margin-top: 100px;
        margin-bottom: 100px;">
    <div style="    width: 800px;
        padding: 20px;
        border: solid thin #00000026;">
        <h1>Create a New Ressource</h1>

        <form action="{{ route('ressource.store') }}" method="POST" enctype="multipart/form-data" class="contact-form-validated contact-one__form">
            @csrf <!-- Laravel's CSRF protection -->

            <div class="row">
                <!-- Title -->
                <div class="col-md-6">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required style="padding-left: 0; padding-right: 0;">
                    @error('titre')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Type -->
                <div class="col-md-6">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required style="padding-left: 0; padding-right: 0;">
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Disponibilité -->
                <div class="col-md-6">
                    <label for="disponibilité">Disponibilité</label>
                    <input type="text" name="disponibilité" id="disponibilité" class="form-control" value="{{ old('disponibilité') }}" required style="padding-left: 0; padding-right: 0;">
                    @error('disponibilité')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-md-6">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" style="padding-left: 0; padding-right: 0; height: auto;">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="col-md-6">
                    <label for="image">Image (optional)</label>
                    <input type="file" name="image" id="image" class="form-control-file" style="padding-left: 0; padding-right: 0; padding-bottom: 30px;">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="thm-btn" style="width: 100%;">Create Ressource</button>
        </form>
    </div>
</div>


</div>

@endsection