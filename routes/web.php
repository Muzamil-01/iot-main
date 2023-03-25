<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('building', [App\Http\Controllers\BuildingController::class, 'index'])->name('building');
Route::get('items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
Route::get('sensors', [App\Http\Controllers\SensorController::class, 'index'])->name('sensors');
Route::get('suppliers', [App\Http\Controllers\SuppliersController::class, 'index'])->name('suppliers');
Route::get('people', [App\Http\Controllers\PeopleController::class, 'index'])->name('people');
Route::get('trainings', [App\Http\Controllers\TrainingController::class, 'index'])->name('trainings');
Route::get('issues', [App\Http\Controllers\IssueController::class, 'index'])->name('issues');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//people handling

Route::get('peoples', [App\Http\Controllers\PeopleController::class, 'index'])->name('peoples.index');
Route::get('peoples/fetch', [App\Http\Controllers\PeopleController::class, 'fetch'])->name('peoples.fetch');
Route::delete('peoples/{id}/delete', [App\Http\Controllers\PeopleController::class, 'delete'])->name('peoples.delete');
Route::get('peoples/{id}/edit/', [App\Http\Controllers\PeopleController::class, 'edit'])->name('peoples.edit');
Route::post('peoples/{id}/update', [App\Http\Controllers\PeopleController::class, 'update'])->name('peoples.update');
Route::get('peoples/add', [App\Http\Controllers\PeopleController::class, 'create'])->name('peoples.create');
Route::post('peoples/store', [App\Http\Controllers\PeopleController::class, 'store'])->name('peoples.store');
Route::get('peoples/{id}/profile', [App\Http\Controllers\PeopleController::class, 'show'])->name('peoples.show');
