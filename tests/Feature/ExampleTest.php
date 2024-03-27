<?php



use Illuminate\Foundation\Testing\DatabaseMigrations;
use Picfodase\Transaction\Enum\TransactionStatusEnum;
use Picfodase\Wallet\Wallet;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostPayment()
    {
        $this->get('/')
            ->assertOk();
    }
}
