<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceLineController;
use App\Http\Controllers\ProfileController;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $invoices = Invoice::where('user_id', Auth::id())->get();
    $clients = Client::where('user_id', Auth::id())->get();
    return view('dashboard', ['invoices' => $invoices, 'clients' => $clients]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CLIENT
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
    Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/client/{client}', [ClientController::class, 'update'])->name('client.update');

    // INVOICE
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::delete('/invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('/invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::put('/invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');

    // INVOICE LINE
    Route::delete('/invoice-line/{invoiceLine}', [InvoiceLineController::class, 'destroy'])->name('invoiceLine.destroy');
});

require __DIR__ . '/auth.php';