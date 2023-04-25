<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    use HasFactory;
    protected $fillable =   [
        'name',
    ];

    /**
     * The films that belong to the Actor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }
}
