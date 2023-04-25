<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilmRequest;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Film;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FilmController extends Controller
{
    public function index($title)
    {
        $api_key = "?apikey=2e0f3cfc";
        $film_title = "&s=" . $title;
        $url = "www.omdbapi.com/" . $api_key . $film_title . "&type=Movie";
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

    public function store(HttpRequest $request)
    {
        $film = $request->all();
        $film_imdbID = Film::where('imdbID', $film['imdbID'])->first();
        if ($film_imdbID === null) {
            $newFilm = new Film();
            $newFilm->fill($film);
            if (!is_null($film['Director'])) {
                $director = $film['Director'];
                $newDirector = new Director();
                $newDirector->name = $director;
                $newDirector->save();
                $newFilm->director_id = $newDirector['id'];
            }
            $newFilm->save();

            if (!is_null($film['Actors'])) {
                $actors = explode(",", $film['Actors']);
                foreach ($actors as $actor) {
                    $newActor = new Actor();
                    $newActor->name = $actor;
                    $newActor->save();
                    $newFilm->actors()->attach($newActor['id']);
                }
            }
        }
    }
}
