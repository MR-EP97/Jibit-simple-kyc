<?php

use App\Http\Controllers\ProfileController;
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


Route::prefix('kyc')->group(function () {
    Route::post('', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('search', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('download-avatar/{avatar}', [ProfileController::class, 'downloadAvatar'])->name('kyc.download-avatar');
});
