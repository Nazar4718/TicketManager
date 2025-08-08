<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'priority' => $this->faker->randomElement($array = array ('low', 'medium', 'high')),
            'status' => $this->faker->randomElement($array = array ('open', 'closed', 'in_progress')),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
