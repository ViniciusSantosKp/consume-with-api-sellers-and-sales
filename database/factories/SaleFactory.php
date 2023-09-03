<?php

namespace Database\Factories;

use App\Actions\CalculateSellerCommissionAction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $value = round(fake()->randomFloat(2), 2);

        return [
            'commission' => (new CalculateSellerCommissionAction)($value),
            'value' => $value,
        ];
    }
}
