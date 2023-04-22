<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $api_key = "?apikey=2e0f3cfc";
        $movie_title = "&s=" . "a";
        $url = "www.omdbapi.com/" . $api_key . $movie_title . "&page=1&type=movie";
        $JSON_movie = Http::get($url);
        $movies = json_decode($JSON_movie, true);

        if (!array_key_exists("Error", $movies)) {
            return response()->json([
                'success' => true,
                'results' => $movies
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "operazione fallita"
            ]);
        }
    }
}
