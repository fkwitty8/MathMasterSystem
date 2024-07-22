<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;
use  App\Http\Controllers\UploadController;
use  App\Http\Controllers\SchoolController;

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



Route::get('/index', function () {

    return view('index');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [ App\Http\Controllers\webinterfaceController::class, 'form']) ->name('form');
Route::get('/upload', [ App\Http\Controllers\webinterfaceController::class, 'load']) ->name('upload');
Route::get('/home', [ App\Http\Controllers\webinterfaceController::class, 'form']) ->name('home');
Route::post('/form', [ App\Http\Controllers\webinterfaceController::class, 'setParameter'])->name('meseter');

Auth::routes([
    'register' => false
]);




