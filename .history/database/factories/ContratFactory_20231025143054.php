<?php

namespace Database\Factories;

use App\Models\Bien;
use App\Models\Locataire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrat>
 */
class ContratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datedebut' => fake()->dateTimeInInterval('-2years', '-1years'),
            'datefin' => fake()->dateTimeBetween('now', '+1years'),
            'approuve' => false,
            'bien' => fake()->randomElement(Bien::all()->pluck('id')),
            'locataire' => fake()->randomElement(Locataire::all()->pluck('id')),
        ];
    }
}
