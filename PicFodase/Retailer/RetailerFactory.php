<?php

namespace Picfodase\Retailer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Picfodase\Shared\Enums\DocumentTypeEnum;

class RetailerFactory extends Factory
{
    protected $model = Retailer::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'document_type' => DocumentTypeEnum::CNPJ->value,
            'document_number' =>  $this->faker->randomNumber(5)
        ];
    }
}
