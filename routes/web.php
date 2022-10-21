<?php

use App\Http\Controllers\DeliveryCompanyController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RetailStoreController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('regions', RegionController::class);
Route::resource('vehicleTypes', VehicleTypeController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('companies', DeliveryCompanyController::class);
Route::resource('retailers', RetailStoreController::class);
Route::resource('parcels', ParcelController::class);
