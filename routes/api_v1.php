<?php

use App\Http\Controllers\Api\V1\CountryV1Controller;
use App\Http\Controllers\Api\V1\CustomerV1Controller;
use App\Http\Controllers\Api\V1\GardenerV1Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/customers', [CustomerV1Controller::class, 'index'])->name('customers');
  Route::post('/customer/register', [CustomerV1Controller::class, 'store'])->name('customer.store');
  Route::get('/customer/{customer}', [CustomerV1Controller::class, 'show'])->name('customer.show');
  Route::put('/customer/update/{customer}', [CustomerV1Controller::class, 'update'])->name('customer.update');

  Route::get('/gardeners', [GardenerV1Controller::class, 'index'])->name('gardeners');
  Route::post('/gardener/register', [GardenerV1Controller::class, 'store'])->name('gardener.store');
  Route::get('/gardener/{gardener}', [GardenerV1Controller::class, 'show'])->name('gardener.show');
  Route::put('/gardener/update/{gardener}', [GardenerV1Controller::class, 'update'])->name('gardener.update');
  Route::get('/gardeners/{country}', [GardenerV1Controller::class, 'gardeners'])->name('gardeners.country');

  Route::get('/country/{country}/gardeners', [CountryV1Controller::class, 'store']);
});
