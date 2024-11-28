<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\OrdenpagoController;
use App\Http\Controllers\ProfileController;
use App\Models\cliente;
use App\Models\ordenpago;
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
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::controller(ClienteController::class)->group(function () {
        Route::get('clientes.create', 'create')->name('clientIndex');
        Route::get('dashboard', 'inicio')->name('dashboard');
        Route::post('clientes.create', 'store')->name('crearCliente'); 
        Route::get('clientes/{cliente}', 'edit')->name('clientesEdit');
        Route::put('clientes/{cliente}', 'update')->name('clientesUpdate');    
        Route::delete('clientes/{cliente}', 'destroy')->name('elicliente');
    });

    Route::controller(LoanController::class)->group(function () {
        Route::get('prestamo.index', 'index')->name('inicioPrestamos');
        Route::get('prestamo.nuevo', 'create')->name('crearPrestamo');
        Route::post('/prestamo.store', 'store')->name('storePrestamo');
        Route::get('prestamo/{id}', 'show')->name('showPrestamo');

    });

    Route::controller(OrdenpagoController::class)->group(function () {
        Route::get('ordenpago.index', 'index')->name('ordepagoIndex');

        Route::get('ordenpago.pago/{id}', 'pago')->name('pagoShow');
        Route::post('/ordenpago/{id}', 'pagar')->name('pagar');
        // Route::get('prestamo.nuevo', 'create')->name('crearPrestamo');
        // Route::post('/prestamo.store', 'store')->name('storePrestamo');
        // Route::get('prestamo/{id}', 'show')->name('showPrestamo');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
