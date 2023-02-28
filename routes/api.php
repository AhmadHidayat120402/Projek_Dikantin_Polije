<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\LoginApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [LoginApiController::class, 'index']);

Route::get('/menus', [MenuApiController::class, 'index']);
Route::post('/menus', [MenuApiController::class, 'store']);
Route::get('/menus/{id}', [MenuApiController::class, 'show']);
Route::put('/menus/{id}', [MenuApiController::class, 'update']);
Route::delete('/menus/{id}', [MenuApiController::class, 'destroy']);


Route::get('/customer', [CustomerApiController::class, 'index']);
