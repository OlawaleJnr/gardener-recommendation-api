<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthV1Controller;
use App\Http\Controllers\Api\V1\DashboardV1Controller;

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
  return view('app');
});

Route::get('/login', function() {
  return view('login');
})->middleware('guest')->name('login');

Route::post('/login', [AuthV1Controller::class, 'login'])->name('auth.login');
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardV1Controller::class, 'dashboard'])->name('dashboard');
  Route::get('/token/create', [DashboardV1Controller::class, 'showToken'])->name('showToken');
  Route::post('/token/create', [DashboardV1Controller::class, 'storeToken'])->name('storeToken');
});
