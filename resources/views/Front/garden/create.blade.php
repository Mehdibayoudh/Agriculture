@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2>Jardin</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><span>Create New Event</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Garden Details</h3>
                        <form action="{{ route('jardins.store') }}" method="POST" class="contact-one__form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Image Upload Field -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image du poste</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>

                                </div>
                                <!-- Garden Name -->
                                <div class="col-md-12">
                                    <input type="text" name="nom" placeholder="Garden Name"  required>
                                    @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Garden Location -->
                                <div class="col-md-12">
                                    <input type="text" name="localisation" placeholder="Garden Location"  required>
                                    @error('localisation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Garden Type -->
                                <div class="col-md-12">
                                    <input type="text" name="type" placeholder="Garden Type"  required>
                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Garden Surface -->
                                <div class="col-md-12">
                                    <input type="number" name="surface" placeholder="Garden Surface (in square meters)"  required>
                                    @error('surface')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Utilisateur ID -->
                                <div class="col-md-12">
                                    <input type="text" name="utilisateur_id" placeholder="User ID (Garden Owner)" value="{{ $conectedJardinier }}" required>
                                    @error('utilisateur_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <button type="submit" class="thm-btn">Save Garden</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.checkout-page -->
    </div>
@endsection
