<?php

use App\Http\Controllers\AllPeople;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
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

// All Users Controller Handling
Route::get('allPeoples', [App\Http\Controllers\AllPeople::class, 'index'])->name('allPeoples');
Route::post('/store', [App\Http\Controllers\AllPeople::class, 'store'])->name('store');
Route::get('/fetchAll', [App\Http\Controllers\AllPeople::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [App\Http\Controllers\AllPeople::class, 'delete'])->name('delete');
Route::get('/edit', [App\Http\Controllers\AllPeople::class, 'edit'])->name('edit');
Route::get('/employees/edit/{id}', [App\Http\Controllers\AllPeople::class, 'edit'])->name('edit_employee');
Route::post('/update', [App\Http\Controllers\AllPeople::class, 'update'])->name('update');
Route::get('/add', [App\Http\Controllers\AllPeople::class, 'add'])->name('add');


Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
Route::get('/roles/create', [App\Http\Controllers\RolesController::class, 'create'])->name('roles_create');
Route::get('/roles/edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('roles.edit');
Route::get('/roles/store', [App\Http\Controllers\RolesController::class, 'store'])->name('roles.store');
Route::get('/roles/update', [App\Http\Controllers\RolesController::class, 'update'])->name('roles.update');




Route::get('/permissions', [App\Http\Controllers\PermissionsController::class, 'index'])->name('permissions');
Route::get('/permissions/create', [App\Http\Controllers\PermissionsController::class, 'create'])->name('permissions.create');
Route::get('/permissions/edit/{id}', [App\Http\Controllers\PermissionsController::class, 'edit'])->name('permissions.edit');
Route::get('/permissions/store', [App\Http\Controllers\PermissionsController::class, 'store'])->name('permissions.store');
Route::get('/permissions/update', [App\Http\Controllers\PermissionsController::class, 'update'])->name('permissions.update');




// Route::resource('roles',[App\Http\Controllers\RolesController::class]);
// Route::resource('permissions',[App\Http\Controllers\PermissionsController::class]);
