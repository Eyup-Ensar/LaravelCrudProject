<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use App\Http\Middleware\CheckPanelAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')->middleware('setLocale');

    Route::get('/home', 'index')->middleware('setLocale');

    Route::get('/urunler', 'index')->middleware('setLocale');


}); 

Route::get('/dilDegistir', [dilController::class, 'changeLocale'])->middleware('setLocale');

Route::prefix('panel')->group(function() {

    // Login sayfasına erişim için kontrol
    Route::get('/login', [AuthController::class, 'loginForm'])
        ->middleware('setLocale') // Kullanıcı paneli kontrolü
        ->name('panel.loginForm');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('setLocale')
        ->name('panel.login');

    Route::get('/register', [AuthController::class, 'registerForm'])
        ->middleware('setLocale') // Kullanıcı paneli kontrolü
        ->name('panel.registerForm');

    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('setLocale')
        ->name('panel.register');

    Route::post('/logout', [authController::class, 'logout'])->middleware('setLocale')->name('panel.auth.logout');

    // Ana sayfa ve ürünlerle ilgili rotalar
    Route::middleware(['setLocale', CheckPanelAuthenticated::class])->group(function() {
        Route::get('/', [ProductController::class, 'panel'])->name('panel.home');

        Route::get('/urunler', [ProductController::class, 'index'])->name('panel.products.index');

        Route::get('/urunler/ekle', [ProductController::class, 'create'])->name('panel.products.create');

        Route::post('/urunler/ekle', [ProductController::class, 'create_last'])->name('panel.products.create_last');

        Route::get('/urunler/guncelle/{id}', [ProductController::class, 'update'])->name('panel.products.update');

        Route::post('/urunler/guncelle/{id}', [ProductController::class, 'update_last'])->name('panel.products.update_last');

        Route::get('/urunler/sil/{id}', [ProductController::class, 'sil'])->name('panel.products.delete');
    });
});

Auth::routes();
