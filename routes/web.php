<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

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

Route::get('/', [CityController::class, 'index'])->name('index');
Route::get('/{slug}', [CityController::class, 'index'])->name('city.index');
Route::get('/{slug}/about', [CityController::class, 'about'])->name('city.about');
Route::get('/{slug}/news', [CityController::class, 'news'])->name('city.news');