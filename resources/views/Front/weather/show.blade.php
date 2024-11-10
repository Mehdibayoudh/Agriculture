@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="padding-top: 50px; padding-bottom: 50px;">The Weathers Now :</h1>

    <div class="row">
        @foreach ($minutelyData as $data)
        <div class="col-md-4 mb-4"> <!-- Each item takes up 1/3 of the row on medium and larger screens -->
            <div style="display: flex; border: 1px solid #ddd;  border-radius: 8px;">
                <img style="width: 50%; margin-right: 15px;" src="assets/images/products/weatherpic.png" alt="Weather Icon">
                <div>
                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($data['time'])->format('H:i') }}</p>
                    <p><strong>Temperature:</strong> {{ $data['values']['temperature'] }}°C</p>
                    <p><strong>Humidity:</strong> {{ $data['values']['humidity'] }}%</p>
                    <p><strong>Wind Speed:</strong> {{ $data['values']['windSpeed'] }} km/h</p>
                    <p><strong>UV Index:</strong> {{ $data['values']['uvIndex'] }}</p>
                    <p><strong>Cloud Cover:</strong> {{ $data['values']['cloudCover'] }}%</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection