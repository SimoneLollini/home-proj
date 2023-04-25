<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Director extends Model
{
    use HasFactory;
    protected $fillable =   [
        'name',
    ];

    /**
     * Get all of the films for the Director
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films(): HasMany
    {
        return $this->hasMany(Film::class);
    }
}
