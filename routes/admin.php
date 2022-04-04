<?php

use App\Http\Controllers\Backend\Advertisement\AdvertisementController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Development\DevelopmentController;
use App\Http\Controllers\Backend\Error\ErrorController;
use App\Http\Controllers\Backend\Home\HomeController;
use App\Http\Controllers\Backend\KhasKhobor\KhashKhoborController;
use App\Http\Controllers\Backend\Motamot\MotamotController;
use App\Http\Controllers\Backend\Multimedia\MultimediaController;
use App\Http\Controllers\Backend\News\NewsController;
use App\Http\Controllers\Backend\Poll\PollController;
use App\Http\Controllers\Backend\Prayer\PrayerController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\SofolPerson\SofolPersonController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;




// Auth::routes(['register' => false]);

Route::name('admin.')->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        
        // category route ============
        Route::resource('category', CategoryController::class, ['names' => 'category']);

        // news route=================
        Route::resource('news', NewsController::class, ['names' => 'news']);
        Route::post('news/post/image/upload', [HomeController::class, 'uploadImage'])->name('post.image.upload');

        // poll route=================
        Route::resource('poll', PollController::class, ['names' => 'poll']);

        // motamot news ===============
        Route::get('motamot', [MotamotController::class, 'index'])->name('motamot');
        Route::get('motamot/create', [MotamotController::class, 'create'])->name('motamot.create');
        Route::get('motamot/edit/{id}', [MotamotController::class, 'edit'])->name('motamot.edit');
        Route::DELETE('motamot/destroy/{id}', [MotamotController::class, 'destroy'])->name('motamot.destroy');

        // sofolPerson ================
        Route::get('sofolPerson', [SofolPersonController::class, 'index'])->name('sofolPerson');
        Route::get('sofolPerson/create', [SofolPersonController::class, 'create'])->name('sofolPerson.create');
        Route::get('sofolPerson/edit/{id}', [SofolPersonController::class, 'edit'])->name('sofolPerson.edit');
        Route::DELETE('sofolPerson/destroy/{id}', [SofolPersonController::class, 'destroy'])->name('sofolPerson.destroy');

        // Khash Khobor ================
        Route::get('khashKhobor', [KhashKhoborController::class, 'index'])->name('khashKhobor');
        Route::get('khashKhobor/create', [KhashKhoborController::class, 'create'])->name('khashKhobor.create');
        Route::get('khashKhobor/edit/{id}', [KhashKhoborController::class, 'edit'])->name('khashKhobor.edit');
        Route::DELETE('khashKhobor/destroy/{id}', [KhashKhoborController::class, 'destroy'])->name('khashKhobor.destroy');


        // motamot news ===============
        Route::get('development', [DevelopmentController::class, 'index'])->name('development');
        Route::get('development/create', [DevelopmentController::class, 'create'])->name('development.create');
        Route::get('development/edit/{id}', [DevelopmentController::class, 'edit'])->name('development.edit');
        Route::DELETE('development/destroy/{id}', [DevelopmentController::class, 'destroy'])->name('development.destroy');

        // advertisement route=================
        Route::resource('advertisement', AdvertisementController::class, ['names' => 'advertisement']);

        // prayer route=================
        Route::resource('prayer', PrayerController::class, ['names' => 'prayer']);

        // multimedia route=================
        Route::resource('multimedia', MultimediaController::class, ['names' => 'multimedia']);

        // Admin Route ==========
        Route::resource('user', UserController::class, ['names' => 'user']);

        // Role Route ==========
        Route::resource('role', RoleController::class, ['names' => 'role']);

        // error route
        Route::get('error', [ErrorController::class, 'index'])->name('error');
    });
});
