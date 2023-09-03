<?php

use App\Livewire\ShowAllSales;
use App\Livewire\ShowSalesBySeller;
use App\Livewire\ShowSellerForm;
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

Route::get('/', function () {
    return redirect()->route('form-seller');
});
Route::get('/form-seller', ShowSellerForm::class)->name('form-seller');
Route::get('/seller/{sellerId}', ShowSalesBySeller::class)->name('seller-sales');
Route::get('/all-sales', ShowAllSales::class)->name('all-sales');
