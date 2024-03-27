<?php

namespace Picfodase\Retailer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Picfodase\Shared\Enums\DocumentTypeEnum;
use Picfodase\Wallet\Wallet;

class Retailer extends Model
{
    use HasFactory;

    protected $table = 'retailers';

    protected $fillable = [
        'name',
        'email',
        'document_type',
        'document_number',
    ];

    protected $casts = [
        'document_type' => DocumentTypeEnum::class,
    ];

    public function wallet(): MorphOne
    {
        return $this->morphOne(Wallet::class, 'user');
    }

    protected static function newFactory(): RetailerFactory
    {
        return RetailerFactory::new();
    }
}
