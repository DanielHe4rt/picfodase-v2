<?php

namespace Picfodase\Wallet;

use Illuminate\Database\Eloquent\Factories\Factory;
use Picfodase\Customer\Customer;
use Picfodase\Retailer\Retailer;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'user_type' => null,
            'user_id' => null,
            'balance' => 1000,
        ];
    }

    public function customer(): static
    {
        $customer = Customer::factory()->create();
        return $this->state(fn (array $attributes) => [
            'user_type' => get_class($customer),
            'user_id' => $customer->getKey(),
        ]);
    }

    public function retailer(): static
    {
        $retailer = Retailer::factory()->create();

        return $this->state(fn (array $attributes) => [
            'user_type' => get_class($retailer),
            'user_id' => $retailer->getKey(),
        ]);
    }
}
