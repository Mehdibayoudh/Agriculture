<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherApiController extends Controller
{
    public function showWeather()
    {
        $apiKey = 'R2edzaTYRkcRIiQMIHfWbNIPFBgMcQsb';
        $location = '33.892166,-9.561555'; // Set your coordinates
        $endpoint = "https://api.tomorrow.io/v4/weather/forecast?location={$location}&apikey={$apiKey}";

        // Fetch data from the Tomorrow.io API
        $response = Http::get($endpoint);

        // Check if the request was successful
        if ($response->successful()) {
            $data = $response->json();
            $minutelyData = $data['timelines']['minutely'];

            return view('Front.weather.show', compact('minutelyData'));
        } else {
            return response()->json(['error' => 'Failed to fetch weather data'], 500);
        }
    }
}
