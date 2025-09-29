<?php

use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

Route::get('/', [SuratController::class,'index'])->name('surat.index');
Route::resource('surat', SuratController::class)->except(['index']);
Route::get('surat/{surat}/download', [SuratController::class,'download'])->name('surat.download');

Route::resource('kategori', KategoriController::class);

Route::view('about','about')->name('about');