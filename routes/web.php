<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

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
// });

Route::get('/', [ToDoListController::class, 'index']);
Route::post('/markCompleteRoute/{id}', [ToDoListController::class, 'markComplete'])->name('markComplete');
Route::post('/saveItemRoute', [ToDoListController::class, 'saveItem'])->name('saveItem');
Route::post('/deleteItemRoute/{id}', [ToDoListController::class, 'deleteItem'])->name('deleteItem');
Route::post('/updateItemRoute/{id}', [ToDoListController::class, 'updateItem'])->name('updateItem');
Route::post('/updateRoute/{id}', [ToDoListController::class, 'update'])->name('update');
Route::post('/filteredRoute', [ToDoListController::class, 'filtered'])->name('filtered');

Route::get('/dbConn', [ToDoListController::class, 'dbConn']);

// Route::get('/dbConn', function () {
//     return view('dbConn');
// });