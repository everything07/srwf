<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\DeferredRecord;
use App\Models\OccurrenceReason;
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
Route::get('/deferred/edit/{deferred_record}', [PostController::class, 'edit']);
Route::get('/deferred/detail/{deferred_record}', [PostController::class, 'detail']);
Route::put('/deferred/{deferred_record}', [PostController::class, 'update']);
Route::delete('/deferred/{deferred_record}', [PostController::class, 'delete']);
Route::get('/deferred/table',[PostController::class,'table']);
Route::get('/deferred/Report', [PostController::class, 'Report']);
Route::post('/posts', [PostController::class, 'store']);
