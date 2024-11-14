@extends('layouts.app')

@section('content')

<!-- /.preloader -->
<div class="page-wrapper">


    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2>Ressources</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><span>Ressources</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->


    <section class="products-page">
        <div class="container">

            <div class="col-sm-12 col-md-12 col-lg-12">

                <div class="row">
                    @foreach($Ressources as $ressource)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="product-card">

                            <div class="product-card__image">
                                @if($ressource->image)
                                <img src="{{ asset('storage/' . $ressource->image) }}" alt="{{ $ressource->titre }}" style="width: 300px; height: 300px;">
                                @else
                                <img src="assets/images/products/product-1-1.jpg" alt="">
                                @endif

                                <div class="product-card__image-content">
                                    <a href="{{ route('ressource.edit', $ressource->id) }}"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('ressource.destroy', $ressource->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ressource?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border:none; background:#ff003e; padding: 10px; border-radius: 100%; margin-left: 5px;">
                                            <i class="fa fa-trash" style="color: white; margin-left: 10px; margin-right: 10px;"></i>
                                        </button>
                                    </form>


                                </div>

                            </div><!-- /.product-card__image -->

                            <div class="product-card__content">
                                <div style="display: flex; flex-direction: column;">
                                    <div>
                                        <div class="product-card__left">
                                            <h3><a href="event-details/{{ $ressource->id }}">{{ $ressource->titre }}</a></h3>
                                            <p>{{ $ressource->type }}</p>
                                        </div>
                                        <div class="product-card__right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <!-- Add to Wishlist Form -->
                                    <div style="padding-top: 10px;">
                                        <form action="{{ route('wishlists.add-ressource', $ressource->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <select style="    padding-left: 0;
                                                                    padding-right: 0;
                                                                    height: 40px;
                                                                    font-size: small;" name="wishlist_id" id="wishlist-select" required>
                                                <option value="">Select a Wishlist</option>
                                                @foreach($wishlists as $wishlist)
                                                <option value="{{ $wishlist->id }}">{{ $wishlist->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" style="    background-color: #60be74;
                                                    color: white;
                                                    border: solid thin #000000;
                                                    font-size: small;
                                                    height: 40px;">Add + </button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.product-card__content -->

                        </div><!-- /.product-card -->
                    </div><!-- /.col -->
                    @endforeach
                </div><!-- /.row -->



            </div><!-- /.col-sm-12 col-md-12 col-lg-9 -->
        </div><!-- /.container -->
    </section><!-- /.products-page -->




</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="organik-icon-close"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="assets/images/logo-light.png" width="155" alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="organik-icon-email"></i>
                <a href="mailto:needhelp@organik.com">needhelp@organik.com</a>
            </li>
            <li>
                <i class="organik-icon-calling"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__language">
                <img src="assets/images/resources/flag-1-1.jpg" alt="">
                <label class="sr-only" for="language-select">select language</label>
                <!-- /#language-select.sr-only -->
                <select class="selectpicker" id="language-select">
                    <option value="english">English</option>
                    <option value="arabic">Arabic</option>
                </select>
            </div><!-- /.mobile-nav__language -->
            <div class="main-menu__login">
                <a href="#"><i class="organik-icon-user"></i>Login / Register</a>
            </div><!-- /.main-menu__login -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="mini-cart">
    <div class="mini-cart__overlay mini-cart__toggler"></div>
    <div class="mini-cart__content">
        <div class="mini-cart__top">
            <h3 class="mini-cart__title">Shopping Cart</h3>
            <span class="mini-cart__close mini-cart__toggler"><i class="organik-icon-close"></i></span>
        </div><!-- /.mini-cart__top -->
        <div class="mini-cart__item">
            <img src="assets/images/products/cart-1-1.jpg" alt="">
            <div class="mini-cart__item-content">
                <div class="mini-cart__item-top">
                    <h3><a href="product-details.html">Banana</a></h3>
                    <p>$9.99</p>
                </div><!-- /.mini-cart__item-top -->
                <div class="quantity-box">
                    <button type="button" class="sub">-</button>
                    <input type="number" id="2" value="1" />
                    <button type="button" class="add">+</button>
                </div>
            </div><!-- /.mini-cart__item-content -->
        </div><!-- /.mini-cart__item -->
        <div class="mini-cart__item">
            <img src="assets/images/products/cart-1-2.jpg" alt="">
            <div class="mini-cart__item-content">
                <div class="mini-cart__item-top">
                    <h3><a href="product-details.html">Tomato</a></h3>
                    <p>$9.99</p>
                </div><!-- /.mini-cart__item-top -->
                <div class="quantity-box">
                    <button type="button" class="sub">-</button>
                    <input type="number" id="2" value="1" />
                    <button type="button" class="add">+</button>
                </div>
            </div><!-- /.mini-cart__item-content -->
        </div><!-- /.mini-cart__item -->
        <div class="mini-cart__item">
            <img src="assets/images/products/cart-1-3.jpg" alt="">
            <div class="mini-cart__item-content">
                <div class="mini-cart__item-top">
                    <h3><a href="product-details.html">Bread</a></h3>
                    <p>$9.99</p>
                </div><!-- /.mini-cart__item-top -->
                <div class="quantity-box">
                    <button type="button" class="sub">-</button>
                    <input type="number" id="2" value="1" />
                    <button type="button" class="add">+</button>
                </div>
            </div><!-- /.mini-cart__item-content -->
        </div><!-- /.mini-cart__item -->
        <a href="checkout.html" class="thm-btn mini-cart__checkout">Proceed To Checkout</a>
    </div><!-- /.mini-cart__content -->
</div><!-- /.cart-toggler -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="organik-icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->
@endsection