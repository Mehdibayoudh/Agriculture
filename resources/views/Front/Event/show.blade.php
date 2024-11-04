@extends('layouts.app')

@section('content')
    <section class="event_detail">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="event_detail_image">
                            <img src="https://cdn.onecklace.com/blog/198/198-1.webp" alt="Image of " style="max-width: 400px;">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="event_detail_content">
                        <h2>{{$event->titre}}</h2>

                        <div class="event_detail_text">
                            <p><strong>Description: </strong> {{$event->description}}</p>
                        </div>
                        <div class="event_detail_text">
                            <p><strong>Date: </strong> {{$event->date->format('d M, Y')}}</p>
                        </div>
                        <div class="event_detail_text">
                            <p><strong>Location: </strong> {{$event->localisation}}</p>
                        </div>

                        <div class="event_detail_text mt-3">
                            <h3 class="mt-4">Sponsors</h3>
                            @if($event->sponsors->isEmpty())
                                <p>No sponsors available for this event.</p>
                            @else
                                <ul>
                                    @foreach($event->sponsors as $sponsor)
                                        <li><strong>Name:</strong> {{ $sponsor->name }} <br>
                                            <strong>Industry:</strong> {{ $sponsor->industry }} <br>
                                            <strong>Phone:</strong> {{ $sponsor->phone }}</li>
                                    @endforeach
                                </ul>
                            @endif
                                 <div class="footer-widget">
                                    <h3 class="footer-widget__title">Newsletter</h3><!-- /.footer-widget__title -->
                                    <form action="#" data-url="YOUR_MAILCHIMP_URL" class="mc-form">
                                        <button type="submit">Participer</button>
                                    </form>
                                    <div class="mc-form__response"></div><!-- /.mc-form__response -->
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
