<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageTextController;
use App\Http\Controllers\SectionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return "404";
});

Route::get('/upload', [ImageTextController::class, 'create'])->name('upload.create');
Route::post('/upload', [ImageTextController::class, 'store'])->name('upload');

Route::post('/upload', [ImageTextController::class, 'store'])->name('upload');


Route::get('/sections', [SectionController::class, 'index'])->name('section.index');
Route::get('/sections/create', [SectionController::class, 'create'])->name('section.create');
Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
