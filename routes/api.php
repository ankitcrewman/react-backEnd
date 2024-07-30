<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImageTextController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\AuthController;

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


// Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Auth
// Protected routes
Route::get('/image-texts', [ImageTextController::class, 'index']);
Route::get('/sections', [SectionController::class, 'show']);

// Route::middleware('throttle:60,1')->group(function () {
// });
// Route::middleware('auth:api')->group(function () {
// });
