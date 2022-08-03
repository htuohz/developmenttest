<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('movie');
});

Route::get('/search', function (Request $request) {
    $query = $request->input('query');
    if (!in_array(strtolower($query), array("red", "green", "blue", "yellow"))) {
        response("invalid input", 401);
    }
    try {
        $response = Http::get('http://www.omdbapi.com', [
            'apikey' => env('OMDBAPI_KEY'),
            't' => $query
        ]);
        $movies = array();
        $response = json_decode($response);
        array_push($movies, $response);
        foreach ($movies as $movie) {
            $movie->color = $query;
        }
        return view('movie', ['movies' => $movies]);
    } catch (Error $err) {
        response("Error occured", 400);
    }
});
