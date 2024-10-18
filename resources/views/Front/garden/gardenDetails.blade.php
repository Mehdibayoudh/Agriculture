@extends('layouts.app')

@section('content')
<section class="product_detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="product_detail_image">
                    @if($jardin->photo)
                        <img src="{{ asset('storage/' . $jardin->photo) }}" alt="Image of {{ $jardin->nom }}" style="max-width: 400px;">
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="product_detail_content">
                    <h2>{{$jardin->nom}}</h2>
                    <div class="product_detail_review_box">
                        <div class="product_detail_review">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                            <span>2 Customer Reviews</span>
                        </div>
                    </div>
                    <div class="product_detail_text">
                        <p><strong>localisation : </strong>  {{$jardin->localisation}}</p>
                    </div>
                    <div class="product_detail_text">
                        <p><strong>type : </strong> {{$jardin->type}}</p>
                    </div>
                    <div class="product_detail_text">
                        <p><strong>Jardinier : </strong> {{ $jardin->utilisateur->name }}</p> <!-- Display user name -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="product-tab-box tabs-box">
                    <ul class="tab-btns tab-buttons clearfix list-unstyled">
                        <li data-tab="#desc" class="tab-btn"><span>description</span></li>
                        <li data-tab="#addi__info" class="tab-btn"><span>Additional info</span></li>
                        <li data-tab="#review" class="tab-btn active-btn"><span>reviews</span></li>
                    </ul>
                    <div class="tabs-content">
                        <div class="tab" id="desc">
                            <div class="product-details-content">
                                <div class="desc-content-box">
                                    <p>Lorem ipsum dolor sit amet sectetur adipiscin elit cras feuiat antesed
                                        ces condimentum viverra duis autue nim convallis id diam vitae duis
                                        egety dictum erosin dictum sem. Vivamus sed molestie sapien aliquam et
                                        facilisis arcu dut molestie augue suspendisse sodales tortor nunced quis
                                        cto ligula posuere cursus keuis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                        sint occaecated cupidatat non proident sunt in culpa qui officia
                                        deserunt mollit anim id est laborum ivamus sed molestie sapien.</p>
                                    <p class="desc-content-box_bottom">Aliquam et facilisis arcuut olestie
                                        augue. Suspendisse sodales tortor nunc quis auctor ligula posuere cursus
                                        duis aute irure dolor in reprehenderit in voluptate velit esse cill
                                        doloreeu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                        proident sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        Vivaus sed delly molestie sapien. Aliquam et facilisis arcuut molestie
                                        augue. </p>
                                </div>
                            </div>
                        </div>

                        <div class="tab" id="addi__info">
                            <ul class="additionali_nfo list-unstyled">
                                <li><span>Weight:</span>3kg</li>
                                <li><span>Category:</span>Food</li>
                                <li><span>Tags:</span>Vegetables, Fruits</li>
                            </ul>
                        </div>

                        <div class="tab active-tab" id="review">
                            <div class="reviews-box">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="product_reviews_box">
                                            <h3 class="product_reviews_title">2 Product reviews</h3>
                                            <div class="product_reviews_single">
                                                <div class="product_reviews_image">
                                                    <img src="assets/images/products/review-1.jpg" alt="">
                                                </div>
                                                <div class="product_reviews_content">
                                                    <h3>Kevin Martins<span>15 Nov, 2019</span></h3>
                                                    <p>Lorem ipsum is simply free text used by copytyping refreshing.
                                                        Neque porro est qui dolorem ipsum quia quaed inventore veritatis
                                                        et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    <div class="product_reviews_rating product_detail_review">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_reviews_single">
                                                <div class="product_reviews_image">
                                                    <img src="assets/images/products/review-2.jpg" alt="">
                                                </div>
                                                <div class="product_reviews_content">
                                                    <h3>Kevin Martins<span>15 Nov, 2019</span></h3>
                                                    <p>Lorem ipsum is simply free text used by copytyping refreshing.
                                                        Neque porro est qui dolorem ipsum quia quaed inventore veritatis
                                                        et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    <div class="product_reviews_rating product_detail_review">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="add_review_box">
                                            <h3 class="add_review_title">Add a review</h3>
                                            <div class="add_review_rating">
                                                <span>Rate this Product?</span>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                                            </div>
                                            <form class="add_review_form" action="#">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-box">
                                                            <textarea name="review" placeholder="Write review" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-box">
                                                            <input type="text" name="name" placeholder="Full name" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-box">
                                                            <input type="email" name="email" placeholder="Email address" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="review_submit_btn">
                                                            <a href="#" class="thm-btn">Submit Review</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
