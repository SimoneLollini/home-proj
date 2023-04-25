<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'imdbID' => 'tt0095765',
            'title' => 'titolo film 1',
            'year' => '2000',
            'rated' => 'PG',
            'released' => 'lorem ipsum',
            'Runtime' => 'lorem ipsum',
            'genre' => 'lorem ipsum',
            'director' => 'lorem ipsum',
            'writer' => 'lorem ipsum',
            'actors' => 'lorem ipsum',
            'plot' => 'lorem ipsum',
            'language' => 'lorem ipsum',
            'country' => 'lorem ipsum',
            'awards' => 'lorem ipsum',
            'poster' => 'lorem ipsum',
            'metascore' => 'lorem ipsum',
            'imdbRating' => 'lorem ipsum',
            'imdbVotes' => 'lorem ipsum',
            'type' => 'lorem ipsum',
            'dvd' => 'lorem ipsum',
            'boxOffice' => 'lorem ipsum',
            'production' => 'lorem ipsum',
            'website' => 'lorem ipsum',
        ]);
    }
}
