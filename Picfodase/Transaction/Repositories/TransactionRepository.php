<?php

namespace Picfodase\Transaction\Repositories;

use Picfodase\Transaction\DTO\TransactionDTO;
use Picfodase\Transaction\Enum\TransactionStatusEnum;
use Picfodase\Transaction\Transaction;

class TransactionRepository
{
    public function startTransaction(TransactionDTO $payload): Transaction
    {
        return Transaction::query()->create([
            'payer_id' => $payload->payerId,
            'payee_id' => $payload->payeeId,
            'amount' => $payload->amount,
            'status' => TransactionStatusEnum::Created,
        ]);
    }

    public function updateTransactionStatus(string $transactionId, TransactionStatusEnum $status)
    {
        return Transaction::query()->find($transactionId)->update([
            'status' => $status
        ]);
    }
}
