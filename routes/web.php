<?php

use App\Http\Controllers\PhotoController;
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

//Rota Pagina Inicial
Route::get('/', [PhotoController::class, 'index']);

Route::get('/photos', [PhotoController::class, 'showAll']);

//Rota que Exibe o Formulario de Cadrasto
Route::get('/photos/new', [PhotoController::class, 'create']);

//Rota que exibe o formulario de edição
Route::get('/photos/edit/{id}', [PhotoController::class, 'edit']);

//Rota que insere no banco de dados uma nova foto
Route::post('/photos', [PhotoController::class, 'store']);

//Rota que altera ma foto no banco de dados
Route::put('/photos/{id}', [PhotoController::class, 'update']);
