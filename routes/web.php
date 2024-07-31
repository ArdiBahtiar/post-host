<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemListController;

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
    return view('welcome');
});

Route::get('/items', [ItemListController::class, 'index']);
Route::get('/items/search', [ItemListController::class, 'search']);
Route::get('/items/create', [ItemListController::class, 'create']);
Route::post('/items', [ItemListController::class, 'store']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
