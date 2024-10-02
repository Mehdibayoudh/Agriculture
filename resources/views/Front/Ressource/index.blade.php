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
            <h2>Products</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><span>Ressources</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->


    <section class="products-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="product-sidebar">
                        <div class="product-sidebar__single product-sidebar__search-widget">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button class="organik-icon-magnifying-glass" type="submit"></button>
                            </form>
                        </div><!-- /.product-sidebar__single -->
                        <div class="product-sidebar__single">
                            <h3>Price</h3>
                            <div class="product-sidebar__price-range">
                                <div class="range-slider-price" id="range-slider-price"></div>
                                <div class="form-group">
                                    <div class="left">
                                        <p>$<span id="min-value-rangeslider"></span></p>
                                        <span>-</span>
                                        <p>$<span id="max-value-rangeslider"></span></p>
                                    </div><!-- /.left -->
                                    <div class="right">
                                        <input type="submit" class="thm-btn" value="Filter">
                                    </div><!-- /.right -->
                                </div>
                            </div><!-- /.product-sidebar__price-range -->
                        </div><!-- /.product-sidebar__single -->
                        <div class="product-sidebar__single">
                            <h3>Categories</h3>
                            <ul class="list-unstyled product-sidebar__links">
                                <li><a href="#">Vegetables <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Fresh Fruits <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Dairy Products <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Tomatos <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Oranges <i class="fa fa-angle-right"></i></a></li>
                            </ul><!-- /.list-unstyled product-sidebar__links -->
                        </div><!-- /.product-sidebar__single -->
                    </div><!-- /.product-sidebar -->
                </div><!-- /.col-sm-12 col-md-12 col-lg-3 -->
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="product-sorter">
                        <p>Showing 1–9 of 12 results</p>
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
                        <div class="col-md-6 col-lg-4">
                            <div class="product-card">
                                @foreach($ressources as $ressource)
                                <div class="product-card__image">
                                    <img src="assets/images/products/product-1-1.jpg" alt="">
                                    <div class="product-card__image-content">
                                        <a href="#"><i class="organik-icon-heart"></i></a>
                                        <a href="cart.html"><i class="organik-icon-shopping-cart"></i></a>
                                    </div><!-- /.product-card__image-content -->
                                </div><!-- /.product-card__image -->

                                <div class="col-md-4">
                                    <div class="product-card__content">
                                        <div class="product-card__left">
                                            <!-- Display event title -->
                                            <h3><a href="event-details/{{ $ressource->id }}">{{ $ressource->titre }}</a></h3>
                                            <h3><a href="event-details/{{ $ressource->id }}">{{ $ressource->type }}</a></h3>
                                            <!-- Display event date -->
                                            <!-- Display event location -->
                                            <p>{{ $ressource->description }}</p>
                                        </div><!-- /.product-card__left -->
                                        <div class="product-card__right">
                                            <!-- Static star rating (you can make this dynamic if you want to show actual ratings) -->
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div><!-- /.product-card__right -->
                                    </div><!-- /.product-card__content -->
                                </div>
                                @endforeach
                            </div><!-- /.product-card -->
                        </div><!-- /.col-md-6 col-lg-4 -->

                    </div><!-- /.row -->
                    <div class="text-center">
                        <a href="#" class="thm-btn products__load-more">Load More</a><!-- /.thm-btn -->
                    </div><!-- /.text-center -->
                </div><!-- /.col-sm-12 col-md-12 col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.products-page -->


    <footer class="site-footer background-black-2">
        <img src="assets/images/shapes/footer-bg-1-1.png" alt="" class="site-footer__shape-1">
        <img src="assets/images/shapes/footer-bg-1-2.png" alt="" class="site-footer__shape-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-widget footer-widget__about-widget">
                        <a href="index.html" class="footer-widget__logo">
                            <img src="assets/images/logo-light.png" alt="" width="105" height="43">
                        </a>
                        <p class="thm-text-dark">Atiam rhoncus sit amet adip
                            scing sed ipsum. Lorem ipsum
                            dolor sit amet adipiscing <br>
                            sem neque.</p>
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-sm-12 col-md-6 -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="footer-widget footer-widget__contact-widget">
                        <h3 class="footer-widget__title">Contact</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__contact">
                            <li>
                                <i class="fa fa-phone-square"></i>
                                <a href="tel:666-888-0000">666 888 0000</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:info@company.com">info@company.com</a>
                            </li>
                            <li>
                                <i class="fa fa-map-marker-alt"></i>
                                <a href="#">66 top broklyn street.
                                    New York</a>
                            </li>
                        </ul><!-- /.list-unstyled footer-widget__contact -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="footer-widget footer-widget__links-widget">
                        <h3 class="footer-widget__title">Links</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links">
                            <li>
                                <a href="index.html">Top Sellers</a>
                            </li>
                            <li>
                                <a href="products.html">Shopping</a>
                            </li>
                            <li>
                                <a href="about.html">About Store</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                            <li>
                                <a href="contact.html">Help</a>
                            </li>
                        </ul><!-- /.list-unstyled footer-widget__contact -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title">Explore</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links">
                            <li>
                                <a href="products.html">New Products</a>
                            </li>
                            <li>
                                <a href="checkout.html">My Account</a>
                            </li>
                            <li>
                                <a href="contact.html">Support</a>
                            </li>
                            <li>
                                <a href="contact.html">FAQs</a>
                            </li>
                        </ul><!-- /.list-unstyled footer-widget__contact -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title">Newsletter</h3><!-- /.footer-widget__title -->
                        <form action="#" data-url="YOUR_MAILCHIMP_URL" class="mc-form">
                            <input type="email" name="EMAIL" id="mc-email" placeholder="Email Address">
                            <button type="submit">Subscribe</button>
                        </form>
                        <div class="mc-form__response"></div><!-- /.mc-form__response -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="bottom-footer">
            <div class="container">
                <hr>
                <div class="inner-container text-center">
                    <div class="bottom-footer__social">
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-facebook-square"></a>
                        <a href="#" class="fab fa-instagram"></a>
                    </div><!-- /.bottom-footer__social -->
                    <p class="thm-text-dark">© Copyright <span class="dynamic-year"></span> by Company.com</p>
                </div><!-- /.inner-container -->
            </div><!-- /.container -->
        </div><!-- /.bottom-footer -->
    </footer><!-- /.site-footer -->

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