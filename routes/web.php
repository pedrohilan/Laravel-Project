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
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index']);
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware('auth');
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::delete('projects/{id}', [ProjectController::class, 'destroy'])->middleware('auth');
Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->middleware('auth');
Route::put('/projects/update/{id}', [ProjectController::class, 'update'])->middleware('auth');
Route::get('/about', function () {
    return view('about');
});
Route::get('dashboard', [ProjectController::class, 'dashboard'])->middleware('auth');