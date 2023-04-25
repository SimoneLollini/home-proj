<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;
    protected $primaryKey = 'imdbID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable =   [
        'imdbID',
        'Title',
        'Year',
        'Poster',
        'Type',
        'director_id'
    ];

    /**
     * Get the director that owns the Film
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    /**
     * The actors that belong to the Film
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }
}
