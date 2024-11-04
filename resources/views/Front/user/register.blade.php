@extends('layouts.app')

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2>Register</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><span>Register</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->


    <section class="contact-one">
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__decor"></div><!-- /.block-title__decor -->
                <p>Get in Touch With Us</p>
                <h3>Do You’ve Any Question? <br>
                    Write us a Message</h3>
            </div><!-- /.block-title -->
            <form class="contact-one__form" method="POST" action="{{ route('register')    }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="col-md-6">
                        <input style="    width: 100%;
    height: 61px;
    background-color: #f4f4f4;
    border: none;
    outline: none !important;
    display: block;
    font-size: 16px;
    padding: 0;
    padding-left: 30px;
    padding-right: 30px;
    color: var(--thm-color);
    margin-bottom: 10px;
    border-radius: 0;" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        <input style="    width: 100%;
    height: 61px;
    background-color: #f4f4f4;
    border: none;
    outline: none !important;
    display: block;
    font-size: 16px;
    padding: 0;
    padding-left: 30px;
    padding-right: 30px;
    color: var(--thm-color);
    margin-bottom: 10px;
    border-radius: 0;" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="thm-btn">Register</button>
                    </div>
                </div>
            </form>
        </div><!-- /.container -->
    </section><!-- /.contact-one --> <br><br><br>
@endsection
