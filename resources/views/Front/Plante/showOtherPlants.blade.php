@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2 class="row ml-1 mt-5">Suggestions de plantes similaires à {{$pricipalPlante->nom}}</h2>
        <div class="row my-5">
                    @foreach ($plantes as $plante)
                        <div class="col-md-6 col-lg-3">
                            <div class="product-card">
                                <div class="product-card__image">
                                    <img style="width: 200px; height:200px;"
                                        src="{{ $plante["default_image"] ? $plante["default_image"]["original_url"] : null}}"
                                        alt="">
                                </div><!-- /.product-card__image -->

                                <div class="col-md-4">
                                    <div class="product-card__content">
                                        <div class="product-card__left">
                                            <h4>{{ ucfirst($plante["common_name"]) }}
                                            </h4>
                                            <p style="width: 200px;">Besoins d'eau - {{ ucfirst($plante["watering"]) }}</p>
                                            <p>Besoins de soleil - {{ ucfirst($plante["sunlight"][0]) }}</p>
                                        </div><!-- /.product-card__left -->
                                    </div><!-- /.product-card__content -->
                                </div>

                            </div><!-- /.product-card -->
                        </div><!-- /.col-md-6 col-lg-4 -->
                    @endforeach

        </div><!-- /.row -->
    </div>
@endsection
