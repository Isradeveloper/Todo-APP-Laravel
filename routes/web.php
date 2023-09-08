<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
//     // return 'Bienvenido a la pagina principal';
// });

// Ruta simple
// Route::get('/', [HomeController::class, 'index']);

// Ruta Agrupada
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/crear', 'create')->name('crear');
    Route::post('/eliminar', 'delete')->name('eliminar');
    Route::post('/completar', 'complete')->name('completar');
});

// Route::get('/curso/{curso}', function($curso) {
//     return "Bienvenido al curso $curso";
// });
