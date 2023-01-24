<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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
Route::controller(MovieController::class)->group(function () {
    route::get('movies', 'index');
    route::get('movie/{id}', 'show');
    route::post('movie', 'store');
    route::put('movie/{id}', 'update');
    route::delete('movie/{id}', 'destroy');
});

Route::controller(UserController::class)->group(function () {
    route::post('login', 'login');
    route::post('register', 'register');
    route::delete('user/{id}', 'destroy');
    Route::middleware('auth:sanctum')->get('logout', 'logout');
});


Route::controller(CommentController::class)->group(function () {
    route::post('comment', 'store');
    route::middleware('auth:sanctum')->get('comments/{movie_id}', 'show');
    route::delete('comment/{id}', 'destroy');
});