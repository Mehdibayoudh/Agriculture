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
                            @for ($i = 1; $i <= 5; $i++)
                                <a href="#">
                                    <a class=" @if($i > $averageRating) deactive @endif" href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </a>
                            @endfor
                            <span>{{ $jardin->reviews->count() }} Customer Reviews</span>
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
                    <div class="product_detail_text mt-3">
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="product-tab-box tabs-box">
                    <ul class="tab-btns tab-buttons clearfix list-unstyled">
                        <li data-tab="#desc" class="tab-btn active-btn"><span>description</span></li>
                        <li data-tab="#review" class="tab-btn"><span>reviews</span></li>
                    </ul>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="desc">
                            <div class="product-details-content">
                                <div class="desc-content-box">
                                    <div class="product_detail_text">
                                        <p><strong>{{$jardin->description}}</strong> </p>
                                    </div>
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

                        <div class="tab" id="review">
                            <div class="reviews-box">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="product_reviews_box">

                                            <h3 class="product_reviews_title"> {{sizeof($jardin->reviews)}} Gardens reviews</h3>
                                            @foreach($jardin->reviews as $review)
                                            <div class="product_reviews_single">
                                                <div class="product_reviews_image">
                                                    <img src="assets/images/products/review-1.jpg" alt="">
                                                </div>

                                                <div class="product_reviews_content product_detail_review">
                                                    <div class="product_detail_review">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <a class=" @if($review->rating < $i) deactive @endif" href="#">
                                                                <i class="fa fa-star"></i>
                                                            </a>
                                                        @endfor
                                                    </div>

                                                    <h3>{{$review->user->name}}<span>{{$review->created_at}}</span></h3>
                                                    <p>{{$review->comment}}</p>

                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="add_review_box">
                                            <h3 class="add_review_title">Add a review</h3>

                                            <form class="add_review_form" action="{{ route('reviews.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="jardin_id" value="{{ $jardin->id }}">

                                                <!-- Rating Input -->
                                                <div class="add_review_rating">
                                                    <span>Rate this Garden</span>
                                                    <br>
                                                    <label>
                                                        <a href="#"><i class="fa fa-star">1</i></a>
                                                        <input type="radio" name="rating" value="1" required>
                                                    </label><br>
                                                    <label>
                                                        <a href="#"><i class="fa fa-star">2</i></a>

                                                        <input type="radio" name="rating" value="2">
                                                    </label><br>
                                                    <label>
                                                        <a href="#"><i class="fa fa-star">3</i></a>
                                                        <input type="radio" name="rating" value="3">
                                                    </label><br>
                                                    <label>
                                                        <a href="#"><i class="fa fa-star">4</i></a>

                                                        <input type="radio" name="rating" value="4">
                                                    </label><br>
                                                    <label>
                                                        <a href="#"><i class="fa fa-star">5</i></a>

                                                        <input type="radio" name="rating" value="5">
                                                    </label><br>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-box">
                                                            <textarea name="comment" placeholder="Write review" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="review_submit_btn">
                                                            <button type="submit" class="thm-btn">Submit Review</button>
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
