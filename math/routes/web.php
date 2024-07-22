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

//Routes For schools' upload, edit, view and delete
Route::get('/upload-schools', function () {
    return view('uploadSchools');
});

Route::post('/upload-schools', [SchoolController::class, 'uploadSchools'])->name('upload.schools');
Route::get('/view-schools', [SchoolController::class, 'viewSchools'])->name('view.schools');
//Route::get('/view-Unverifiedrepresentatives', [SchoolController::class, 'viewUnverifiedRepresentatives'])->name('view.unverified.representatives');
Route::get('/schools/{id}/edit', [SchoolController::class, 'editSchool'])->name('edit.school');
Route::post('/schools/{id}/edit', [SchoolController::class, 'updateSchool'])->name('update.school');

Route::delete('/schools/{id}', [SchoolController::class, 'deleteSchool'])->name('delete.school');

Route::get('/challenges', [ChallengeController::class, 'index'])->name('index');
Route::get('/create', [ChallengeController::class, 'create'])->name('create');
Route::post('/challenges', [ChallengeController::class, 'store'])->name('store');



