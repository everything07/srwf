<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SharingController;

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

Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/deferred/edit/{deferred_record}', 'edit')->name('edit');
    Route::get('/deferred/detail/{deferred_record}', 'detail')->name('detail');
    Route::put('/deferred/{deferred_record}', 'update')->name('update');
    Route::delete('/deferred/{deferred_record}', 'delete')->name('delete');
    Route::get('/deferred/table', 'table')->name('table');
    Route::get('/deferred/Report', 'Report')->name('Report');
    Route::post('/posts', 'store')->name('store');
});

Route::controller(SharingController::class)->middleware(['auth'])->group(function(){
    Route::get('/crewing_diary/list', 'list_display')->name('list_display');
    Route::post('/crewing_diary/confirm', 'confirm')->name('confirm');
    Route::post('/crewing_diary/post', 'post')->name('post');
    Route::get('/crewing_diary', 'sharing')->name('sharing');
    Route::get('/crewing_diary/detail/{crewingdiary}', 'detail')->name('detail');
    Route::get('/crewing_diary/editRepost/{crewingdiary}', 'editRepost')->name('editRepost');
    Route::post('/crewing_diary/toggleLike/{crewingDiaryId}', 'toggleLike')->name('toggleLike');
    Route::post('/crewing_diary/reconfirm/{crewingdiary}','reconfirm')->name('reconfirm');
    Route::put('/crewing_diary/repost/{crewingdiary}','repost')->name('repost');
    Route::delete('/crewing_diary/delete/{crewingdiary}','delete')->name('delete');
    Route::put('/crewing_diary/deletingOrder/{crewingdiary}','deletingOrder')->name('deletingOrder');
    

});
require __DIR__.'/auth.php';

