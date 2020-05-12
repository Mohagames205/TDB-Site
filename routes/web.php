<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/plots", function(){
    return redirect("https://plots.tdbnetwork.nl");
});

Route::post("/solliciteren", "ApplyController@create");

Route::get("/solliciteren", "ApplyController@index")->name("apply");

Route::get("/hk", "HouseKeepingController@index")->name("hk");

Route::get("/hk/sollicitaties", "HouseKeepingController@applies")->name("hk.applies");

Route::get("/hk/bans", "HouseKeepingController@bans")->name("hk.bans");

Route::put("/hk/sollicitaties/{app}", "ApplyController@edit");

Route::delete("/hk/sollicitaties/{app}", "ApplyController@delete");

Route::delete("/hk/bans/{ban}", "BanController@delete");

Route::get("/discord", function(){
    return redirect("https://discord.gg/D4XspYs");
})->name("discord");

Route::get("/shop", function(){
    return redirect("https://store.tdbnetwork.nl");
})->name("shop");
