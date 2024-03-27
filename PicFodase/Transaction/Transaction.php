<?php

namespace Picfodase\Transaction;

use Illuminate\Database\Eloquent\Model;
use Picfodase\Transaction\Enum\TransactionStatusEnum;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'payer_id',
        'payee_id',
        'amount',
        'status'
    ];

    protected $casts = [
        'status' => TransactionStatusEnum::class,
        'amount' => 'integer'
    ];
}
