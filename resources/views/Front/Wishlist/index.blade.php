@extends('layouts.app')

@section('content')

<!-- /.preloader -->
<div class="page-wrapper">
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2>Wishlist</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><span>Wishlist</span></li>
            </ul>
        </div>
    </section>

    <section class="products-page">
        <div class="container">
            <div style="display: flex;
                        -ms-flex-wrap: wrap;
                        flex-wrap: wrap;
                        margin-right: -15px;
                        margin-left: -15px;
                        gap: 30px;
                        justify-content: center;" class="row">
                @foreach($Wishlists as $wishlist)
                <div style="border: solid thin #00000038;
                    padding: 20px;
                    border-radius: 15px;"
                    class="col-md-6 col-lg-3 mb-4"> <!-- Adjusted to show 4 in a row on large screens -->
                    <div class="product-card">
                        <div style="text-align: center;" class="product-card__image">
                            <img style="width: 65%;" src="assets/images/products/wishlist.png" alt="">

                            <div class="product-card__image-content">
                                <a href="{{ route('wishlists.edit', $wishlist->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('wishlists.destroy', $wishlist->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this wishlist?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none; background:#ff003e; padding: 10px; border-radius: 100%; margin-left: 5px;">
                                        <i class="fa fa-trash" style="color: white; margin-left: 10px; margin-right: 10px;"></i>
                                    </button>
                                </form>
                                <a href="{{ route('wishlists.show', $wishlist->id) }}" style="margin-right: 10px;">
                                    <i class="fa fa-eye" aria-hidden="true"></i> <!-- Eye icon for showing wishlist -->
                                </a>
                            </div>

                        </div>

                        <div style="justify-content: center;" class="product-card__content">
                            <div class="product-card__left">
                                <h1 style="font-size: 24px;">{{ $wishlist->name }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
</div><!-- /.page-wrapper -->

@endsection