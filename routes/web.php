<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/auth/login', [HomeController::class, 'login'])->name('login.submit');

Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/show/{param1?}', [MatakuliahController::class, 'show']);

Route::get('/dashboard', [DashboardController::class, 'index']); 