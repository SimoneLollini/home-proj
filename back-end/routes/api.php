<?php

use App\Http\Controllers\API\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
});
Route::get('/films/title/{films:title}', [FilmController::class, 'index']);
Route::get('/films/id/{film:id}', [FilmController::class, 'show']);
Route::get('/films/stored', [FilmController::class, 'indexStored']);
Route::post('/films/store', [FilmController::class, 'store']);
