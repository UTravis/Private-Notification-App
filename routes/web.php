<?php

use App\Http\Controllers\PostController;
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

Route::get('/listen', function(){
    return view('template.listen.index');
})->middleware('auth')->name('listen');


Route::get('/message', function(){
    return view('template.message');
})->middleware('auth');


Route::get('/send-message', [PostController::class, 'sendMessage'])->name('message.send');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
