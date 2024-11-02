<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BasicformController;
use App\Http\Controllers\Admin\BasicTableController;
use App\Http\Controllers\Admin\ChequeBookRegisterController;
use App\Http\Controllers\Admin\ChequeBookReportController;
use App\Http\Controllers\Admin\ChequePayController;
use App\Http\Controllers\Admin\ChequeReceiveController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DataTableController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\ChequeReceivesController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {



    Route::resource('/dashboard/company',CompanyController::class);
    Route::get('/dashboard/company/status/{id}',[CompanyController::class,'status'])->name('status.company');
    Route::resource('/dashboard/bank',BankController::class);
    Route::resource('/dashboard/client',ClientController::class);
    Route::get('/dashboard/client/status/{id}',[ClientController::class,'status'])->name('status.client');
    Route::resource('/dashboard/vendor',VendorController::class);
    Route::get('/dashboard/vendor/status/{id}',[VendorController::class,'status'])->name('status.vendor');
    Route::resource('/dashboard/chequepay',ChequePayController::class);
    Route::post('/dashboard/chequepay/update/status', [ChequePayController::class, 'updateStatus'])->name('chequepay.updateStatus');
    Route::post('/dashboard/chequepay/update/reason', [ChequePayController::class, 'updateReason'])->name('chequepay.updateReason');


    Route::resource('/dashboard/chequerecive',ChequeReceiveController::class);
    Route::resource('/dashboard/chequebook-register',ChequeBookRegisterController::class);
    Route::resource('/dashboard/chequebook-report',ChequeBookReportController::class);

    Route::post('/dashboard/chequepay/vendor/store',[ChequePayController::class, 'vendorStore'])->name('extra.vendor.store');
    Route::post('/dashboard/chequepay/bank/store',[ChequePayController::class, 'bankStore'])->name('extra.bank.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
