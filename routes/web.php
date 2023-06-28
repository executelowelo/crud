<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\TruckController;

Route::resource('trucks', TruckController::class);
Route::get('trucks/{truck}/subunits', [TruckController::class, 'subunits'])->name('trucks.subunits');
Route::get('trucks/{truck}/add-subunit', [TruckController::class, 'addSubunit'])->name('trucks.addSubunit');
Route::post('trucks/{truck}/store-subunit', [TruckController::class, 'storeSubunit'])->name('trucks.storeSubunit');
Route::post('trucks/{truck}/assign-subunit', [TruckController::class, 'assignSubunit'])->name('trucks.assignSubunit');
Route::get('trucks/{truck}/subunits', [TruckController::class, 'subunits'])->name('trucks.subunits');



