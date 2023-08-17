<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpajakanController;
use App\Http\Controllers\HomeController;



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




// Untuk fungsi create yang digunakan user untuk mengisi form
// Route::get('/', 'App\Http\Controllers\PerpajakanController@createWp');
// Route::post('/perpajakan', 'App\Http\Controllers\PerpajakanController@storeWp');

// Route::get('/cariKelurahan/{id}', 'App\Http\Controllers\PerpajakanController@cariKelurahan');

// Route::get('/perpajakan/objekpajak', 'App\Http\Controllers\PerpajakanController@createOp');
// Route::post('/perpajakan/storeOp', 'App\Http\Controllers\PerpajakanController@storeOp');

// Route::get('/perpajakan/cariKelurahan/{id}', 'App\Http\Controllers\PerpajakanController@cariKelurahan');
// Route::get('/perpajakan/cariBidangUsaha/{id}', 'App\Http\Controllers\PerpajakanController@cariBidangUsaha');

// Route::get('/perpajakan/uploadfile', 'App\Http\Controllers\PerpajakanController@createUf');
// Route::post('/perpajakan/storeUf', 'App\Http\Controllers\PerpajakanController@storeUf');

// Route::get('/perpajakan/pernyataan', 'App\Http\Controllers\PerpajakanController@createPernyataan');
// Route::post('/perpajakan/storeSemua', 'App\Http\Controllers\PerpajakanController@storeSemua');

// Route::get('/perpajakan/selesai', 'App\Http\Controllers\PerpajakanController@createSelesai');
// Route::get('/perpajakan/selesai', 'App\Http\Controllers\PerpajakanController@createSelesai');

// Untuk fungsi read, update dan delete yang digunakan admin untuk memanipulasi form
// Route::get('/admin', 'App\Http\Controllers\PerpajakanController@indexAdmin');
// Route::get('/admin/objekpajak', 'App\Http\Controllers\PerpajakanController@indexAdminOp');
// Route::get('/show/{wajibPajak}', 'App\Http\Controllers\PerpajakanController@show');
// Route::get('/showOp', 'App\Http\Controllers\PerpajakanController@showOp');
// Route::get('/editWp', 'App\Http\Controllers\PerpajakanController@editWp');
// Route::get('/editOp', 'App\Http\Controllers\PerpajakanController@editWp');
// Route::get('/admin/editOp', 'App\Http\Controllers\PerpajakanController@editOp');
// Route::get('/admin/updateWp', 'App\Http\Controllers\PerpajakanController@updateWp');
// Route::get('/admin/updateOp', 'App\Http\Controllers\PerpajakanController@updateOp');
// Route::get('/admin/DeleteWp', 'App\Http\Controllers\PerpajakanController@destroyWp');
// Route::get('/admin/DeleteOp', 'App\Http\Controllers\PerpajakanController@destroyOp');

//user(Masyarakat)
Route::get('/', [PerpajakanController::class, 'createWp']);
Route::post('/perpajakan', [PerpajakanController::class, 'storeWp']);
Route::get('/cariKelurahan/{id}', [PerpajakanController::class, 'cariKelurahan']);
Route::get('/perpajakan/objekpajak', [PerpajakanController::class, 'createOp']);
Route::post('/perpajakan/storeOp', [PerpajakanController::class, 'storeOp']);
Route::get('/perpajakan/cariKelurahan/{id}', [PerpajakanController::class, 'cariKelurahan']);
Route::get('/perpajakan/cariBidangUsaha/{id}', [PerpajakanController::class, 'cariBidangUsaha']);
Route::get('/perpajakan/uploadfile', [PerpajakanController::class, 'createUf']);
Route::post('/perpajakan/storeUf', [PerpajakanController::class, 'storeUf']);
Route::get('/perpajakan/pernyataan', [PerpajakanController::class, 'createPernyataan']);
Route::post('/perpajakan/storeSemua', [PerpajakanController::class, 'storeSemua']);
Route::get('/perpajakan/selesai', [PerpajakanController::class, 'createSelesai']);

//admin
// Auth::routes();

Route::get('/admin', [HomeController::class, 'index']);
Route::get('/admin/editOp', [HomeController::class, 'editOp']);
Route::get('/admin/updateWp', [HomeController::class, 'updateWp']);
Route::get('/admin/updateOp', [HomeController::class, 'updateOp']);
Route::get('/admin/showWp/{wajibPajak}', [HomeController::class, 'showWp']);
Route::get('/admin/showOp/{objekPajak}', [HomeController::class, 'showOp']);
Route::get('/editWp/{wajibPajak}/editWp', [HomeController::class, 'editWp']);
Route::get('/editOp/{objekPajak}/editOp', [HomeController::class, 'editOp']);
Route::patch('/admin/updateWp/{wajibPajak}', [HomeController::class, 'updateWp']);
Route::patch('/admin/updateOp/{objekPajak}', [HomeController::class, 'updateOp']);
Route::patch('/admin/updateUf/{objekPajak}', [HomeController::class, 'updateUp']);
Route::delete('/admin/{wajibPajak}', [HomeController::class, 'destroyWp']);
Route::delete('/admin/{objekPajak}', [HomeController::class, 'destroyOp']);

// Route::get('/admin', [PerpajakanController::class, 'indexAdmin']);
// Route::get('/admin/editOp', [PerpajakanController::class, 'editOp']);
// Route::get('/admin/updateWp', [PerpajakanController::class, 'updateWp']);
// Route::get('/admin/updateOp', [PerpajakanController::class, 'updateOp']);
// Route::get('/admin/showWp/{wajibPajak}', [PerpajakanController::class, 'showWp']);
// Route::get('/admin/showOp/{objekPajak}', [PerpajakanController::class, 'showOp']);
// Route::get('/editWp/{wajibPajak}/editWp', [PerpajakanController::class, 'editWp']);
// Route::get('/editOp/{objekPajak}/editOp', [PerpajakanController::class, 'editOp']);
// Route::get('/admin/updateWp/{wajibPajak}', [PerpajakanController::class, 'updateWp']);
// Route::get('/admin/updateOp/{objekPajak}', [PerpajakanController::class, 'updateOp']);
// Route::get('/admin/updateUf/{objekPajak}', [PerpajakanController::class, 'updateUp']);
// Route::get('/admin/{wajibPajak}', [PerpajakanController::class, 'destroyWp']);
// Route::get('/admin/{objekPajak}', [PerpajakanController::class, 'destroyOp']);

//Login
// Route::get('/login', [PerpajakanController::class, 'indexLogin']);
// Route::get('/register', [PerpajakanController::class, 'register']);
// Route::get('/register', [PerpajakanController::class, 'register']);
// Route::post('/register', [PerpajakanController::class, 'storeRegister']);

// Show Wp dan Op
// Route::get('/admin/showWp/{wajibPajak}', 'App\Http\Controllers\PerpajakanController@showWp');
// Route::get('/admin/showOp/{objekPajak}', 'App\Http\Controllers\PerpajakanController@showOp');
// Edit Wp dan Op
// Route::get('/editWp/{wajibPajak}/editWp', 'App\Http\Controllers\PerpajakanController@editWp');
// Route::get('/editOp/{objekPajak}/editOp', 'App\Http\Controllers\PerpajakanController@editOp');
// Update Wajib Pajak
// Route::patch('/admin/updateWp/{wajibPajak}', 'App\Http\Controllers\PerpajakanController@updateWp');
// Update Objek Pajak
// Route::patch('/admin/updateOp/{objekPajak}', 'App\Http\Controllers\PerpajakanController@updateOp');
// Route::patch('/admin/updateUf/{objekPajak}', 'App\Http\Controllers\PerpajakanController@updateUf');
// Hapus Wp dan Op
// Route::delete('/admin/{wajibPajak}', 'App\Http\Controllers\PerpajakanController@destroyWp');
// Route::delete('/admin/{objekPajak}', 'App\Http\Controllers\PerpajakanController@destroyOp');


// Login
// Route::get('/login', 'App\Http\Controllers\LoginController@indexLogin')->middleware('guest');
// Route::post('/login', 'App\Http\Controllers\LoginController@authenticate');
