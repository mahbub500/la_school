<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;



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


Route::get('/test/logout', [ApiUserController::class, 'logout'])->name('api.logout');


// Public routes
Route::post('/test/create', [ApiUserController::class, 'create']);
Route::post('/login', [ApiUserController::class, 'login']);



// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/test', [ApiUserController::class, 'Index'])->name('api.user');
    Route::post('/test/logout', [ApiUserController::class, 'logout']);
    Route::get('/test', [ApiUserController::class, 'Index'])->name('api.user');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
