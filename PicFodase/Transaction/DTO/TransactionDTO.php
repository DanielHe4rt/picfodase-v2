<?php

namespace Picfodase\Transaction\DTO;

readonly class TransactionDTO
{
    public function __construct(
        public string $payerId,
        public string $payeeId,
        public int    $amount
    )
    {
    }
}
