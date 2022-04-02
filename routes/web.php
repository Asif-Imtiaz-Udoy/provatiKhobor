<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\Frontend\Home\HomeController::class, 'index'])->name('home');
Route::get('/news-detail/{id}', [App\Http\Controllers\Frontend\Details\DetailsController::class, 'newsDetail'])->name('newsDetail');
Route::get('category/{id}', [App\Http\Controllers\Frontend\Details\DetailsController::class, 'categoryDetails'])->name('categoryDetails');
//Vote route
Route::post('/poll/{id}', [\App\Http\Controllers\Frontend\Home\HomeController::class, 'vote'])->name('poll.vote');