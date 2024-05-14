<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaMatkulController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('mahasiswa','MahasiswaController@index');

Route::get('/greeting', function () {
    return 'Hello World';
});


// Route::get ('/dashboard',  function  (){

       
// });
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin',[AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => ['auth', 'CheckRole:admin']],function(){

    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update']);
    Route::get('/mahasiswa/{id}/delete', [MahasiswaController::class, 'delete']);
    Route::get('/mahasiswa/{id}/profile', [MahasiswaController::class, 'profile']);
    Route::post('/mahasiswa/{id}/addnilai', [MahasiswaController::class, 'addnilai']);
    Route::get('/mahasiswa/{id}/updatenilai/{matkul_kode}', [MahasiswaController::class, 'editnilai']);
    Route::post('/mahasiswa_matkul/{id}', [MahasiswaMatkulController::class, 'update']);
    Route::get('dosen/{id}/profile', [DosenController::class,'profile']);
    Route::get('dosen', [DosenController::class,'index']);
    Route::post('/dosen', [DosenController::class, 'create']);
    Route::get('dosen/{id}/edit', [DosenController::class,'edit']);
    Route::post('dosen/{id}/update', [DosenController::class,'update']);
    Route::get('mahasiswa/exportExcel/', [mahasiswaController::class, 'exportExcel']);
    
   


});

Route::group(['middleware' => ['auth', 'CheckRole:admin,mahasiswa']],function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
   
    


});