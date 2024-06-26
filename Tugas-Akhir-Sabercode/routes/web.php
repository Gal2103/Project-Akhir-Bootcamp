<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AuthController;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PeranController;

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
    return view('dashboard');
});

Route::get('/master', function () {
    return view('layouts.master');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('genre', GenreController::class);
    Route::resource('cast', castController::class);
    Route::resource('film', FilmController::class);
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::put('/profil/{id}', [ProfilController::class, 'update']);
    Route::post('/kritik/{id}', [KritikController::class, 'store']);
    Route::post('/peran/{id}', [PeranController::class, 'store']);
});




Auth::routes();
