<?php

use App\Http\Controllers\ArticleController;
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

Route::namespace ('Articles')->prefix('articles')->group(
    function () {
        Route::post('/register', [ArticleController::class, 'register']);
        Route::get('/get', [ArticleController::class, 'getArticles']);
    }
);
