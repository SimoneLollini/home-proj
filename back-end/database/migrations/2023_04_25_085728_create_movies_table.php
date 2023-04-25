<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->string('imdbID', 30)->primary();
            $table->string('title');
            $table->string('year', 10)->nullable();
            $table->string('rated', 10)->nullable();
            $table->string('released')->nullable();
            $table->string('runtime', 20)->nullable();
            $table->string('genre')->nullable();
            $table->string('awards')->nullable();
            $table->string('director')->nullable();
            $table->string('writer')->nullable();
            $table->string('actors')->nullable();
            $table->text('plot')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('metascore', 50)->nullable();
            $table->string('imdbRating', 20)->nullable();
            $table->string('imdbVotes', 20)->nullable();
            $table->string('type')->nullable();
            $table->string('poster')->nullable();
            $table->string('dvd')->nullable();
            $table->string('boxOffice')->nullable();
            $table->string('production')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
