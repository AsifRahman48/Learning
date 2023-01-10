<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EloquentController;
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

Route::resource('eloquent',EloquentController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/jquery', function () {
    return view('jquery.index');
});

Route::get('/javaScript', function () {
    return view('JS.index');
});

Route::get('/lang/{lang}', function ($lang) {
     App::setlocale($lang);
    return view('lang');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('products', ProductController::class);

Route::get('students',[StudentController::class,'index']);
Route::get('students/list',[StudentController::class,'getStudents'])->name('students.list');


require __DIR__.'/auth.php';
