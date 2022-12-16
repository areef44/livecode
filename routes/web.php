<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});




// route grouping for student
Route::prefix('student')
    ->name('student.')
    ->controller(StudentController::class)
    ->group(function () {
        Route::get('/', 'index')->name('list'); // student.list
        Route::get('/show/{student}', 'show')->name('show');
        Route::get('/edit/{student}', 'edit')->name('edit');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{student}', 'update')->name('update');
        Route::delete('/destroy/{student}', 'destroy')->name('destroy');
    });
