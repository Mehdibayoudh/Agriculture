@extends('layouts.app')

@section('content')
    <section class="event_detail">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="event_detail_image">
                        @if($event->image_url)
                            <img src="{{ asset($event->image_url) }}" alt="Event Image" class="img-fluid event-image" style="width: 450px">
                        @endif
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
                            <h3 class="mt-4">Participants</h3>
                            <ul>
                                @foreach($event->participants as $participant)
                                    <li>{{ $participant->name }}</li>
                                @endforeach
                            </ul>

                            <div class="footer-widget">
                                <!-- Participate Button -->
                                @if(auth()->check())
                                    <!-- Check if the user is already participating -->
                                    @if($event->participants->contains(auth()->user()))
                                        <p class="text-success">You have already joined this event.</p>
                                    @else
                                        <!-- Participate Button -->
                                        <form action="{{ route('events.participate', $event->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Participate in Event</button>
                                        </form>
                                    @endif
                                @else
                                    <p>Please <a href="{{ route('login') }}">log in</a> to participate.</p>
                                @endif
                                    <div class="mc-form__response"></div><!-- /.mc-form__response -->
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
