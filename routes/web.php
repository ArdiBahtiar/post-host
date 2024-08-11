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
Route::get('/items/{id}', [ItemListController::class, 'focus'])->name('items.focus');
Route::post('/items', [ItemListController::class, 'store']);

Route::post('/items/{list}/bookmark', [BookmarkController::class, 'save'])->name('bookmarks.save');
Route::delete('/items/{list}/bookmark', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
Route::get('/bookmarked', [BookmarkController::class, 'bookmarked']);

Route::get('/chatQuery/{id}', [MessageController::class, 'initiate'])->middleware(['auth'])->name('chat.initiate');
Route::get('/chat/{conversation}', [MessageController::class, 'chatIndex'])->middleware(['auth'])->name('chat.show');
Route::post('/messages', [MessageController::class, 'store'])->middleware(['auth']);

// Route::get('/test-user-id/{id}', function ($id) {
//     $list = App\Models\ItemList::find($id);
//     dd($list->user_id);  // This should output the correct user_id or null if something is wrong
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
