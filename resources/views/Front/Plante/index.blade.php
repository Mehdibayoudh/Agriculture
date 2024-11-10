@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2 class="row ml-1 mt-5">Liste des plantes du Jardin
            {{ $jardin->nom || '' }}
        </h2>
        <div class="row my-5">

            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="product-sidebar">
                    <div class="product-sidebar__single">
                        <h3>Categories</h3>
                        <ul class="list-unstyled product-sidebar__links">
                            @foreach ($categories as $categorie)
                                <li><a href="#">{{ $categorie->nom }} <i class="fa fa-angle-right"></i></a></li>
                                </option>
                            @endforeach
                        </ul><!-- /.list-unstyled product-sidebar__links -->
                    </div><!-- /.product-sidebar__single -->
                </div><!-- /.product-sidebar -->
            </div><!-- /.col-sm-12 col-md-12 col-lg-3 -->
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="product-sorter">
                    <p>Showing {{ count($plantes) }} results</p>
                    <div class="product-sorter__select">
                        <select class="selectpicker">
                            <option value="#">Sort by popular</option>
                            <option value="#">Sort by popular</option>
                            <option value="#">Sort by popular</option>
                            <option value="#">Sort by popular</option>
                        </select>
                    </div><!-- /.product-sorter__select -->
                </div><!-- /.product-sorter -->
                <div class="row">
                    @foreach ($plantes as $plante)
                        <div class="col-md-6 col-lg-4">
                            <div class="product-card">

                                <div class="product-card__image">
                                    <img style="width: 200px; height:200px;"
                                        src="{{ $plante->image ? URL::asset('/uploads/' . $plante->image) : URL::asset('/uploads/' . 'defaultPlante.jpg') }}"
                                        alt="">
                                    <div class="product-card__image-content">
                                        <a href="{{ route('editPlante', [$plante->jardin_id, $plante->id]) }}"><span
                                                style="font-size: 16px; font-weight:400;">Edit</span></a>
                                        <form action="{{ route('plante.destroy', $plante->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm"
                                                style="margin-left: 10px; font-size: 16px; width: 56px; height: 56px; border-radius: 50%;"
                                                type="submit">X</button>

                                        </form>
                                    </div><!-- /.product-card__image-content -->
                                </div><!-- /.product-card__image -->

                                <div class="col-md-4">
                                    <div class="product-card__content">
                                        <div class="product-card__left">
                                            <h4><a
                                                    href="{{ route('showPlante', [$plante->jardin_id, $plante->id]) }}">{{ ucfirst($plante->nom) }}</a>
                                            </h4>
                                        </div><!-- /.product-card__left -->
                                    </div><!-- /.product-card__content -->
                                </div>

                            </div><!-- /.product-card -->
                        </div><!-- /.col-md-6 col-lg-4 -->
                    @endforeach
                </div><!-- /.row -->
                <div class="text-center">
                    <a href="{{ route('createPlante', [$jardin->id]) }}" class="thm-btn products__load-more">Add Plante</a>
                </div>

            </div><!-- /.col-sm-12 col-md-12 col-lg-9 -->
        </div><!-- /.row -->
    </div>
@endsection
