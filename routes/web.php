<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\SingleGameController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('index');
//});
//Route::get('/show', function () {
//    return view('show');
//});

Route::get("/", [GameController::class, 'index'])->name("home");
Route::get("game/{slug}", [SingleGameController::class, "index"])->name("game.show");
