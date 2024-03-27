<?php

namespace Picfodase\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Picfodase\Shared\Enums\DocumentTypeEnum;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'document_type' => DocumentTypeEnum::CPF->value,
            'document_number' => $this->faker->randomNumber(5)
        ];
    }
}
