<?php

namespace Picfodase\Transaction;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Picfodase\Transaction\Http\Controllers\TransactionController;

class TransactionRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::post(
            '/transactions',
            [TransactionController::class, 'postPayment']
        )->name('transactions.store');
    }
}
