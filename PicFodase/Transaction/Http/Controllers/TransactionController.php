<?php

namespace Picfodase\Transaction\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Picfodase\Transaction\Http\Requests\CreateTransactionRequest;
use Picfodase\Transaction\Services\TransactionService;

class TransactionController extends Controller
{
    public function __construct(
        private readonly TransactionService $transactionService
    )
    {
    }

    public function postPayment(
        CreateTransactionRequest $request
    ): Response
    {
        $this->transactionService->handle($request->toDTO());
        return response()->noContent();
    }
}
