<?php

use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/entreprises', EntrepriseController::class);
Route::post('/entreprises/create', [EntrepriseController::class, 'store'])->name('superadmin.entreprises.store');
Route::post('/entreprises/edit/{$id}', [EntrepriseController::class, 'edit'])->name('superadmin.entreprises.edit');
Route::post('/entreprises/destroy/{$id}', [EntrepriseController::class, 'destroy'])->name('superadmin.entreprises.destroy');

Route::resource('/utilisateurs', UtilisateurController::class);
Route::post('/utilisateurs/create', [UtilisateurController::class, 'store'])->name('superadmin.utilisateurs.store');


Route::resource('/profiles', ProfileController::class);
Route::post('/profiles/create', [ProfileController::class, 'store'])->name('profiles.store');
