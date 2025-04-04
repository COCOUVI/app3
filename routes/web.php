<?php

use App\Http\Controllers\EneamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('eneam')->group(function(){
    Route::get('/ig',[EneamController::class,"AfficherPageIg"])->name('ig');
    Route::post('/ig',[EneamController::class,"PostPageIg"])->name('postIg');
    Route::get('/register',[EneamController::class,"AfficherRegister"])->name('regist');
    Route::get('/login', [EneamController::class,"AfficherLogin"]);
});


Route::middleware(['guest'])->group(function (){
    Route::get('/editp/{product}',[EneamController::class,"EditProduct"])->name('edit');
    Route::put('/edit/{product}',[EneamController::class,"update"])->name('editp');
    Route::get('/logout',[EneamController::class,"disconnect"])->name('breakconnect');
    Route::get('/register',[EneamController::class,"CreateUser"])->name("registering");
    Route::post('/registration',[EneamController::class,"SaveUser"])->name('handleUser');
    Route::get('/login',[EneamController::class,"ShowLogin"])->name('login');
    Route::post('/login',[EneamController::class,"PostLogin"])->name('handleLogin');
});
Route::post('/product-post',[EneamController::class,"gp"])->name('form');
Route::get('/product',[EneamController::class,"Showpage"])->name('create');
Route::get('/show/{product}',[EneamController::class,"Show"])->name('show');
Route::get('/products',[EneamController::class,"AfficherProduit"])->name('home');
Route::delete('/deleteproduct/{product}',[EneamController::class,"Destroy"])->name('RemoveP');
Route::get('/register',[EneamController::class,"CreateUser"])->name("registering");
Route::post('/registration',[EneamController::class,"SaveUser"])->name('handleUser');
Route::get('/login',[EneamController::class,"ShowLogin"])->name('login');
Route::post('/login',[EneamController::class,"PostLogin"])->name('handleLogin');
Route::get('/forgot-password',[EneamController::class,"ShowEmailpage"])->name('Emailpage');
// Route::post('/forgot-password',[EneamController::class,"Show"]);
Route::post('/forgot-password',[EneamController::class,"SendEmail"])->middleware('guest')->name("password.email"); //route pardefaut
Route::get('/reset-password/{token}',[EneamController::class,"Showresetpassword"])->name('password.reset')->middleware('guest');
Route::post('/reset-password',[EneamController::class,"HandleResetpassword"])->name('password.update')->middleware('guest');



// Laravel inclut Eloquent, un mappeur objet-relationnel (ORM) qui
//  rend agréable l'interaction avec votre base de données. Lorsque vous utilisez Eloquent, 
//  chaque table de base de données a un « modèle » correspondant qui est utilisé pour interagir avec cette table
//  . En plus de récupérer des enregistrements de la table de base de données, les modèles Eloquent vous permettent également d'insérer
//  ,de mettre à jour et de supprimer des enregistrements de la table.
// DB_CONNECTION=mysql
// DB_HOST=127.0.0.1
// DB_PORT=3307
// DB_DATABASE=pro