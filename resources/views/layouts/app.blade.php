<!DOCTYPE html>
<html lang="en">

<>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Page || Oganik || HTML Template For Organic Stores</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
        href="https://fonts.googleapis.com/css2?family=Homemade+Apple&amp;family=Abril+Fatface&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />

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
     <!-- Emoji Button Library -->
     <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.js"></script>
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/organik.css') }}" />
</head>

<body>
    <header class="main-header">
        <nav class="main-menu">
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
                <div class="main-menu__login">
                    <!-- Show login and register links if the user is not authenticated -->
                </div><!-- /.main-menu__login -->
                <ul class="main-menu__list">

                    <li class="">
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="dropdown">
                        <a href="{{ url('/') }}">Gardens</a>
                        <ul>
                            <li><a href="{{ url('/jardins') }}">all gardens</a></li>
                            @auth
                            @if (auth()->user()->role === 'jardinier')
                            <li><a href="{{ route('getJardinierGardens', ['etat' => 1]) }}">My Gardens</a></li>
                            @endif
                            @endauth

                        </ul>
                    </li>
                    <li><a href="{{ url('/event') }}">Events</a></li>
                    <!-- ressources -->
                    <li class="dropdown">
                        <a href="{{ url('/ressource') }}">Ressource</a>
                        <ul>
                            <li><a href="{{ url('/ressource') }}">ressources</a></li>
                            <li><a href="{{ url('/ressource/create') }}">create ressource</a></li>
                        </ul>
                    </li>
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
                        <a href="{{ url('/blogs') }}">Blogs</a>
                        <ul>
                            <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                            <li><a href="{{ url('/myblogs') }}">My Blogs</a></li>
                            <li><a href="{{ url('/blogs/create') }}">Create Blog</a></li>
                        </ul>
                    </li>
                    <li>
                        |
                    </li>

                    <!-- Check if the user is authenticated -->
                    @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="btn btn-outline-danger" style="margin-left: 10px; font-size: 16px;"
                                type="submit">Logout</button>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li>
                        <a class="btn btn-success" style="color: white" href="{{ route('loginPage') }}">Login</a>

                    </li>

                    <li>
                        <a class="btn btn-success" style="color: white" href="{{ route('registerPage') }}">Register</a>

                    </li>
                    @endguest

                    <li class="dropdown">
                        <a style="color: #ff0000c2; font-size: 30px; cursor: pointer;"><i class="fa fa-heart"></i></a>
                        <ul>
                            <li><a href="{{ url('/wishlists') }}">My Wishlists</a></li>
                            <li><a href="{{ url('/wishlists/create') }}">create Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a style="color: #75ed437a; font-size: 30px; cursor: pointer;"><i class="fa fa-cloud-sun" aria-hidden="true"></i></a>
                        <ul>
                            <li><a href="{{ url('/weather') }}">Check Weather</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.container -->
        </nav>
        <!-- /.main-menu -->
    </header><!-- /.main-header -->

    <div>
        @yield('content') <!-- Content will be injected here -->
    </div>

    <footer class="site-footer background-black-2">
        <img src="{{ asset('assets/images/shapes/footer-bg-1-1.png') }}" alt="" class="site-footer__shape-1">
        <img src="{{ asset('assets/images/shapes/footer-bg-1-2.png') }}" alt=""
            class="site-footer__shape-2">
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-widget footer-widget__about-widget">
                            <a href="{{ url('index.html') }}" class="footer-widget__logo">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" width="105"
                                    height="43">
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
                                    <a href="{{ url('index.html') }}">Top Sellers</a>
                                </li>
                                <li>
                                    <a href="{{ url('products.html') }}">Shopping</a>
                                </li>
                                <li>
                                    <a href="{{ url('about.html') }}">About Store</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact.html') }}">Contact</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact.html') }}">Help</a>
                                </li>
                            </ul><!-- /.list-unstyled footer-widget__contact -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Explore</h3><!-- /.footer-widget__title -->
                            <ul class="list-unstyled footer-widget__links">
                                <li>
                                    <a href="{{ url('products.html') }}">New Products</a>
                                </li>
                                <li>
                                    <a href="{{ url('checkout.html') }}">My Account</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact.html') }}">Support</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact.html') }}">FAQs</a>
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
        </div>
    </footer><!-- /.site-footer -->

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
