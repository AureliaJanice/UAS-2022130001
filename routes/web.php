<?php


use App\Http\Controllers\CameraController;
use App\Models\Camera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/camera', [CameraController::class, '__invoke'])->name('camera.index');

Auth::routes();

Route::resource('camera', CameraController::class)->except('index');

