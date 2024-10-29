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

    Route::resource('/dashboard/basicform',BasicformController::class);

    Route::resource('/dashboard/basictable',BasicTableController::class);
    Route::resource('/dashboard/datatable',DataTableController::class);

    Route::resource('/dashboard/company',CompanyController::class);
    Route::resource('/dashboard/bank',BankController::class);
    Route::resource('/dashboard/client',ClientController::class);
    Route::resource('/dashboard/vendor',VendorController::class);
    Route::resource('/dashboard/chequepay',ChequePayController::class);
    Route::resource('/dashboard/chequerecive',ChequeReceiveController::class);
    Route::resource('/dashboard/chequebook-register',ChequeBookRegisterController::class);
    Route::resource('/dashboard/chequebook-report',ChequeBookReportController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
