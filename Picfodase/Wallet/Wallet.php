<?php

namespace Picfodase\Wallet;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Picfodase\Retailer\Retailer;

/**
 * @property int $balance
 */
class Wallet extends Model
{
    use HasUuids, HasFactory;

    public $incrementing = false;

    protected $table = 'wallets';

    protected $fillable = [
        'id',
        'user_type',
        'user_id',
        'balance'
    ];

    protected $casts = [
        'balance' => 'integer'
    ];

    protected static function newFactory(): WalletFactory
    {
        return WalletFactory::new();
    }

    public function belongsToRetailer(): bool
    {
        return $this->attributes['user_type'] == Retailer::class;
    }

    public function hasBalance(int $amount): bool
    {
        return $this->balance < $amount;
    }
}
