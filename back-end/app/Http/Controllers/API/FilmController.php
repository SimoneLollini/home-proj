<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function index($title)
    {
        $api_key = "?apikey=2e0f3cfc";
        $film_title = "&s=" . $title;
        $url = "www.omdbapi.com/" . $api_key . $film_title . "&page=1&type=Movie";
        $JSON_films = Http::get($url);
        $films = json_decode($JSON_films, true);

        if (!array_key_exists("Error", $films)) {
            return response()->json([
                'success' => true,
                'results' => $films['Search']
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "Operazione fallita, prova con un titolo più preciso!"
            ]);
        }
    }


    public function indexStored()
    {
        $films = Film::all();
        return response()->json([
            'success' => true,
            'results' => $films
        ]);
    }


    public function show($id)
    {
        $api_key = "?apikey=2e0f3cfc";
        $film_id = $id;
        $url = "www.omdbapi.com/" . $api_key . "&i=" . $film_id;

        $JSON_film = Http::get($url);
        $film = json_decode($JSON_film, true);


        if (!array_key_exists("Error", $film)) {

            $film_imdbID = Film::where('imdbID', $film['imdbID'])->first();

            if ($film_imdbID === null) {
                $this->store($film);
            }

            return response()->json([
                'success' => true,
                'results' => $film
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "Nessun film trovato con questo id!"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @Return void()
     */
    public function store(array $film)
    {
        $newFilm = new Film;
        $newFilm->imdbID = $film['imdbID'];
        $newFilm->Title = $film['Title'];
        $newFilm->Year = $film['Year'];
        $newFilm->Poster = $film['Poster'];
        $newFilm->Type = $film['Type'];
        $newFilm->save();
    }
}
