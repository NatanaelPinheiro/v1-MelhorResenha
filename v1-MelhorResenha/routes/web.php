<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [ReviewController::class, 'index']);

Route::get('/review/create', [ReviewController::class, 'create'])->middleware('auth');

Route::get('/review/{id}', [ReviewController::class, 'show']);

Route::post('/review', [ReviewController::class, 'store']);

Route::get('/dashboard', [ReviewController::class, 'dashboard'])->middleware('auth');

Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::get('/review/edit/{id}', [ReviewController::class,'edit'])->middleware('auth');

Route::put('/review/update/{id}', [ReviewController::class,'update'])->middleware('auth');

Route::post('/review/save/{id}', [ReviewController::class, 'saveReview'])->middleware('auth');

Route::delete('/review/leave/{id}', [ReviewController::class, 'leaveReview'])->middleware('auth');