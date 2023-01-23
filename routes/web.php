<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('login', function () {
    return view('page.login');
})->name('loginPage');

Route::post('login', 'App\Http\Controllers\AuthController@actionLogin')->name('login');
Route::get('logout', 'App\Http\Controllers\AuthController@actionLogout')->name('logout');
Route::get('kirim_surat', 'App\Http\Controllers\SuratController@form')->name('kirim_surat');
Route::get('surat_masuk', 'App\Http\Controllers\SuratController@masuk')->name('surat_masuk');
Route::get('surat_keluar', 'App\Http\Controllers\SuratController@keluar')->name('surat_keluar');
Route::post('report', 'App\Http\Controllers\SuratController@report')->name('report');
Route::post('lihat_surat', 'App\Http\Controllers\SuratController@lihat')->name('lihat_surat');
Route::get('kirim_telegram', 'App\Http\Controllers\InputTelegram@form')->name('kirim_telegram');
Route::get('telegram_masuk', 'App\Http\Controllers\TelegramController@masuk')->name('telegram_masuk');
Route::get('telegram_keluar', 'App\Http\Controllers\TelegramController@keluar')->name('telegram_keluar');
Route::post('kirim_telegram', 'App\Http\Controllers\InputTelegram@report')->name('kirimreporttelegram');
Route::post('lihat_telegram', 'App\Http\Controllers\TelegramController@lihat')->name('lihat_telegram');
Route::get('kirim_disposisi', 'App\Http\Controllers\DisposisiController@form')->name('kirim_disposisi');
Route::get('disposisi_keluar', 'App\Http\Controllers\DisposisiController@keluar')->name('disposisi_keluar');
Route::get('disposisi_masuk', 'App\Http\Controllers\DisposisiController@masuk')->name('disposisi_masuk');
Route::post('kirimreportdisposisi', 'App\Http\Controllers\DisposisiController@report')->name('kirimreportdisposisi');
Route::post('lihat_disposisi', 'App\Http\Controllers\DisposisiController@lihat')->name('lihat_disposisi');
Route::get('user_management', 'App\Http\Controllers\UserManagementController@index')->name('user_management');