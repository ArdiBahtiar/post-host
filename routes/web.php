<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

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
Route::get('/items/{datas}', [ItemListController::class, 'focus']);
Route::post('/items', [ItemListController::class, 'store']);

Route::post('/items/{list}/bookmark', [BookmarkController::class, 'save'])->name('bookmarks.save');
Route::delete('/items/{list}/bookmark', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
Route::get('/bookmarked', [BookmarkController::class, 'bookmarked']);

Route::get('/chat', [MessageController::class, 'chatIndex'])->middleware(['auth']);
Route::post('/messages', [MessageController::class, 'store'])->middleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
