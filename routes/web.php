<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompaniesController;

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
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('employee', EmployeesController::class);
Route::resource('companie', CompaniesController::class);

