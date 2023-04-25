<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $primaryKey = 'imdbID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable =   [
        'title',
        'year',
        'rated',
        'released',
        'Runtime',
        'genre',
        'director',
        'writer',
        'actors',
        'plot',
        'language',
        'country',
        'awards',
        'poster',
        'metascore',
        'imdbRating',
        'imdbVotes',
        'imdbID',
        'type',
        'dvd',
        'boxOffice',
        'production',
        'website',
    ];
}
