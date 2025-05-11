<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

// Route untuk preview dummy
Route::get('/preview', function () {
    return view('pages.preview'); // Sesuaikan dengan folder "pages"
});

// Halaman statis dari folder "pages"
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/harga', function () {
    return view('pages.harga');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/solusi', function () {
    return view('pages.solusi');
});

Route::get('/footer', function () {
    return view('pages.footer');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

// ROUTE KHUSUS / UNTUK BE

Route::get('/dashboard', function () {
    return view('backend.layouts.app');
})->name('dashboard');

Route::resource('absensi', AbsensiController::class);


Route::prefix('backend')->name('backend.')->group(function () {
    Route::resource('absensi', AbsensiController::class);
});