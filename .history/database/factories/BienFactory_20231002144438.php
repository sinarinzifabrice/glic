<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loyer' => fake()->numberBetween($min = 1000, $max = 1600),
            'numappartement' => fake()->numberBetween($min = 1, $max = 500),
            'numrue' => fake()->numberBetween($min = 1, $max = 200),
            'nomrue' => fake()->streetName(),
            'quartier' => fake()->randomElement(['Rohero', 'Bwiza', 'Quartier industriel', 'Ngagara']),
            'ville' => fake()->randomElement(['Bujumbura']),
            'statut' => fake()->boolean(),
            'php' => fake()->randomElement(TypedeBien::all()->pluck('id')),
        ];
    }
}
