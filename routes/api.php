<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SwipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('swipe')->name('swipe.')->group(function () {
    Route::post('/user/user', [SwipeController::class, 'storeUserToUser'])->name('user.user');
    Route::post('/user/chat', [SwipeController::class, 'storeUserToChat'])->name('user.chat');
    Route::post('/chat/user', [SwipeController::class, 'storeChatToUser'])->name('chat.user');

    Route::get('/user/user/delete', [SwipeController::class, 'deleteAllUserToUser'])->name('user.user.delete');
    Route::get('/user/chat/delete', [SwipeController::class, 'deleteAllChatToUser'])->name('user.chat.delete');
    Route::get('/chat/user/delete', [SwipeController::class, 'deleteAllUserToChat'])->name('chat.user.delete');
});

Route::prefix('category')->name('category.')->group(function () {
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/{region}/region', [CategoryController::class, 'allRegionals'])->name('category.regional.all');
    Route::get('/main/all', [CategoryController::class, 'allMain'])->name('category.main.all');
    Route::get('/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/{category}/deadline', [CategoryController::class, 'setDeadline'])->name('category.set.deadline');
});
