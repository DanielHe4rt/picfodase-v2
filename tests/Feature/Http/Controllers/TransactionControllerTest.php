<?php

namespace Tests\Feature\Http\Controllers;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Picfodase\Transaction\Enum\TransactionStatusEnum;
use Picfodase\Wallet\Wallet;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostPayment()
    {
        $this->withoutExceptionHandling();
        // Prepare
        $payer = Wallet::factory()->customer()->create([
            'balance' => 10_00
        ]);
        $payee = Wallet::factory()->retailer()->create([
            'balance' => 0
        ]);

        $amount = 5_00;

        // Act
        $response = $this->postJson(route('transactions.store'), [
            'payer_id' => $payer->getKey(),
            'payee_id' => $payee->getKey(),
            'amount' => $amount
        ]);

        // Assert

        $response->assertNoContent();

        $this->assertDatabaseHas('transactions', [
            'payer_id' => $payer->getKey(),
            'payee_id' => $payee->getKey(),
            'amount' => $amount,
            'status' => TransactionStatusEnum::Completed,
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $payer->getKey(),
            'balance' => 5_00,
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $payee->getKey(),
            'balance' => 5_00,
        ]);
    }
}
