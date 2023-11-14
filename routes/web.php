<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/', [PostController::class, 'index']);
// Route::get('deferred/detail/{deferred_record}', [postController::class, 'detail']);
Route::get('deferred/detail/{deferred_record}', [PostController::class, 'detail']);
Route::get('/deferred/table',[PostController::class,'table']);
Route::get('/deferred/Report', [PostController::class, 'Report']);
Route::post('/posts', [PostController::class, 'store']);
