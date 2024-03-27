<?php

namespace Picfodase\Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Picfodase\Transaction\DTO\TransactionDTO;

class CreateTransactionRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'payer_id' => ['required', 'exists:wallets,id'],
            'payee_id' => ['required', 'exists:wallets,id'],
            'amount' => ['required', 'integer']
        ];
    }

    public function toDTO(): TransactionDTO
    {
        return new TransactionDTO(
            payerId: $this->input('payer_id'),
            payeeId: $this->input('payee_id'),
            amount: $this->input('amount')
        );
    }
}
