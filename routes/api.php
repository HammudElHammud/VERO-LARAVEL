<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('tasks' , [\App\Http\Controllers\Api\TaskController::class , 'makeApiCall']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
