<?php

use App\Http\Controllers\EneamController;
use Illuminate\Support\Facades\Route;

// Routes Publiques
Route::get('/', function () { return view('welcome'); });

Route::prefix('eneam')->group(function(){
    Route::get('/ig', [EneamController::class, "AfficherPageIg"])->name('ig');
    Route::post('/ig', [EneamController::class, "PostPageIg"])->name('postIg');
});

// Authentification (Guest)
Route::middleware(['guest'])->group(function (){
    Route::get('/register', [EneamController::class, "CreateUser"])->name("register");
    Route::post('/registration', [EneamController::class, "SaveUser"])->name('handleUser');
    Route::get('/login', [EneamController::class, "ShowLogin"])->name('login');
    Route::post('/login', [EneamController::class, "PostLogin"])->name('handleLogin');
    Route::get('/forgot-password', [EneamController::class, "ShowEmailpage"])->name('password.request');
    Route::post('/forgot-password', [EneamController::class, "SendEmail"])->name('password.email');
    Route::get('/reset-password/{token}', [EneamController::class, "Showresetpassword"])->name('password.reset');
    Route::post('/reset-password', [EneamController::class, "HandleResetpassword"])->name('password.update');
});

// Routes Protégées (Auth)
Route::middleware(['auth'])->group(function (){
    Route::get('/product', [EneamController::class, "Showpage"])->name('create');
    Route::post('/product-post', [EneamController::class, "gp"])->name('form');
    Route::get('/products', [EneamController::class, "AfficherProduit"])->name('home');
    Route::get('/show/{product}', [EneamController::class, "Show"])->name('show');
    Route::delete('/deleteproduct/{product}', [EneamController::class, "Destroy"])->name('RemoveP');
    Route::get('/editp/{product}', [EneamController::class, "EditProduct"])->name('edit');
    Route::put('/edit/{product}', [EneamController::class, "update"])->name('editp');
    Route::get('/logout', [EneamController::class, "disconnect"])->name('logout');
});