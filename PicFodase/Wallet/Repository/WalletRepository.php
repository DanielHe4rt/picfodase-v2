<?php

namespace Picfodase\Wallet\Repository;

use Picfodase\Wallet\Wallet;

class WalletRepository
{
    public function findById(string $walletId): Wallet
    {
        return Wallet::find($walletId);
    }

    public function deposit(string $walletId, int $amount): bool
    {
        return Wallet::query()
            ->find($walletId)
            ->increment('balance', $amount);
    }

    public function withdrawal(string $walletId, int $amount): bool
    {
        return Wallet::query()
            ->find($walletId)
            ->decrement('balance', $amount);
    }
}
