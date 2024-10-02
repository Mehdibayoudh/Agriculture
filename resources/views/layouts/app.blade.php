<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Page || Oganik || HTML Template For Organic Stores</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&amp;family=Abril+Fatface&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />

    <!-- CSS Vendor Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/organik-icon/organik-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/organik.css') }}" />
</head>
<body>

<header class="main-header">
    <div class="topbar">
        <div class="container">
            <div class="main-logo">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" width="105" alt="">
                </a>
                <div class="mobile-nav__buttons">
                    <a href="#" class="search-toggler"><i class="organik-icon-magnifying-glass"></i></a>
                    <a href="#" class="mini-cart__toggler"><i class="organik-icon-shopping-cart"></i></a>
                </div><!-- /.mobile__buttons -->

                <span class="fa fa-bars mobile-nav__toggler"></span>
            </div><!-- /.main-logo -->

            <div class="topbar__left">
                <div class="topbar__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.topbar__social -->
                <div class="topbar__info">
                    <i class="organik-icon-email"></i>
                    <p>Email <a href="mailto:info@organik.com">info@organik.com</a></p>
                </div><!-- /.topbar__info -->
            </div><!-- /.topbar__left -->
            <div class="topbar__right">
                <div class="topbar__info">
                    <i class="organik-icon-calling"></i>
                    <p>Phone <a href="tel:+92-666-888-0000">92 666 888 0000</a></p>
                </div><!-- /.topbar__info -->
                <div class="topbar__buttons">
                    <a href="#" class="search-toggler"><i class="organik-icon-magnifying-glass"></i></a>
                    <a href="#" class="mini-cart__toggler"><i class="organik-icon-shopping-cart"></i></a>
                </div><!-- /.topbar__buttons -->
            </div><!-- /.topbar__left -->

        </div><!-- /.container -->
    </div><!-- /.topbar -->
    <nav class="main-menu">
        <div class="container">
            <div class="main-menu__login">
                <a href="#"><i class="organik-icon-user"></i>Login / Register</a>
            </div><!-- /.main-menu__login -->
            <ul class="main-menu__list">
                <li class="dropdown">
                    <a href="{{ url('/') }}">Home</a>
                    <ul>
                        <li><a href="{{ url('/') }}">Home One</a></li>
                        <li><a href="{{ url('/home-two') }}">Home Two</a></li>
                        <li class="dropdown">
                            <a href="#">Header Styles</a>
                            <ul>
                                <li><a href="{{ url('/') }}">Header One</a></li>
                                <li><a href="{{ url('/home-two') }}">Header Two</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li class="dropdown">
                    <a href="{{ url('/products') }}">Shop</a>
                    <ul>
                        <li><a href="{{ url('/products') }}">Shop</a></li>
                        <li><a href="{{ url('/product-details') }}">Product Details</a></li>
                        <li><a href="{{ url('/cart') }}">Cart Page</a></li>
                        <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/news') }}">News</a>
                    <ul>
                        <li><a href="{{ url('/news') }}">News</a></li>
                        <li><a href="{{ url('/news-details') }}">News Details</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
            <div class="main-menu__language">
                <img src="{{ asset('assets/images/resources/flag-1-1.jpg') }}" alt="">
                <label class="sr-only" for="language-select">select language</label>
                <select class="selectpicker" id="language-select-header">
                    <option value="english">English</option>
                    <option value="arabic">Arabic</option>
                </select>
            </div><!-- /.main-menu__language -->
        </div><!-- /.container -->
    </nav>
    <!-- /.main-menu -->
</header><!-- /.main-header -->

<div class="container">
    @yield('content') <!-- Content will be injected here -->
</div>

<footer>
    <!-- Footer content -->
</footer>
<script src="{{ asset('assets/vendors/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/vendors/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('assets/vendors/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
<script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
<!-- template js -->
<script src="{{ asset('assets/js/organik.js') }}"></script>

<!-- Include JavaScript files -->
</body>
</html>
