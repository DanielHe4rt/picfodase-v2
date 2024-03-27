<?php

namespace Picfodase\Customer;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Picfodase\Shared\Enums\DocumentTypeEnum;

class Customer extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;

    protected $table = 'customers';

    protected $fillable = [
        'id',
        'name',
        'email',
        'document_type',
        'document_number',
    ];



    protected static function newFactory(): CustomerFactory
    {
        return CustomerFactory::new();
    }
}
