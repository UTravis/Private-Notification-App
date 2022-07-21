<?php

use App\Http\Controllers\Api\MessageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-messages/{user_id}', [MessageController::class, 'getMessage']);
Route::patch('mark-as-read/{id}', [MessageController::class, 'markAsRead']);
Route::patch('mark-all-as-read', [MessageController::class, 'markAllAsRead']);
