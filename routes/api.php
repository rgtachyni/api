<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api-get', [AnggotaaController::class, 'getDataApi']);
Route::get('/api-detail', [AnggotaaController::class, 'getDetail']);
Route::get('/api-hapus', [AnggotaaController::class, 'Hapus']);
Route::get('/api-create', [AnggotaaController::class, 'Tambah']);
Route::get('/api-edit', [AnggotaaController::class, 'Edit']);
