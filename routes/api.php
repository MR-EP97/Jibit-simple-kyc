<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/kyc', [ProfileController::class, 'store']);
Route::get('/kyc', [ProfileController::class, 'show']);
Route::get('/kyc/download-avatar/{avatar}', [ProfileController::class, 'downloadAvatar'])->name('kyc.download-avatar');

