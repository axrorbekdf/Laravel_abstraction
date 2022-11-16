<?php

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

Route::get('{resource}', [App\Http\Controllers\ResourceController::class, 'index']);
Route::post('{resource}', [App\Http\Controllers\ResourceController::class, 'store']);
Route::get('{resource}/{id}', [App\Http\Controllers\ResourceController::class, 'show']);
Route::put('{resource}/{id}', [App\Http\Controllers\ResourceController::class, 'update']);
Route::delete('{resource}/{id}', [App\Http\Controllers\ResourceController::class, 'destroy']);
