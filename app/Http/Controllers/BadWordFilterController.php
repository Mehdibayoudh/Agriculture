<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BadWordFilterController extends Controller
{
    public function filterBadWords(Request $request)
    {
        // Validate the incoming request to ensure 'content' is a required string
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        // Create a new Guzzle HTTP client
        $client = new Client();

        // Prepare the API request to Profanity Filter API
        $response = $client->request('GET', 'https://profanity-filter-by-api-ninjas.p.rapidapi.com/v1/profanityfilter', [
            'headers' => [
                'x-rapidapi-host' => 'profanity-filter-by-api-ninjas.p.rapidapi.com',
                'x-rapidapi-key' => env('RAPIDAPI_KEY'), // Make sure your API key is stored in .env file
            ],
            'query' => [
                'text' => $validated['content'], // Pass the content to the API
            ],
        ]);

        // Get the response body and decode it from JSON
        $body = json_decode($response->getBody()->getContents(), true);

        // Return a JSON response with the censored content and the profanity status
        return response()->json([
            'filteredContent' => $body['censored'] ?? $validated['content'],  // Return the filtered content
            'hasProfanity' => $body['has_profanity'] ?? false, // Check if the text contains profanity
        ]);
    }
}
