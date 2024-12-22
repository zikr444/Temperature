<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('realtime');
});


Route::get('/riwayat/ruangPengolahan', function () {
    return view('riwayat.ruangPengolahan');
});

use App\Http\Controllers\RuangController;

Route::post('/ruangan/tambah', [RuangController::class, 'store'])->name('ruangan.store');
Route::get('/riwayat/{ruang}', [RuangController::class, 'showHistory'])->name('ruangan.history');