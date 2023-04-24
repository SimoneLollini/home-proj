<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index($title)
    {
        $api_key = "?apikey=2e0f3cfc";
        $movie_title = "&s=" . $title;
        $url = "www.omdbapi.com/" . $api_key . $movie_title . "&page=1&type=movie";
        $JSON_movies = Http::get($url);
        $movies = json_decode($JSON_movies, true);

        if (!array_key_exists("Error", $movies)) {
            return response()->json([
                'success' => true,
                'results' => $movies['Search']
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "Operazione fallita, prova con un titolo più preciso!"
            ]);
        }
    }
    public function show($id)
    {
        $api_key = "?apikey=2e0f3cfc";
        $movie_id = $id;
        $url = "www.omdbapi.com/" . $api_key . "&i=" . $movie_id;

        $JSON_movie = Http::get($url);
        $movie = json_decode($JSON_movie, true);
        if (!array_key_exists("Error", $movie)) {
            return response()->json([
                'success' => true,
                'results' => $movie
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "Nessun film trovato con questo id!"
            ]);
        }
    }
}
