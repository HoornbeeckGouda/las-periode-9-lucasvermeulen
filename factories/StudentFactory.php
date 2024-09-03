<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        $initials = $firstname[0] . $lastname[0];
        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'initials' => $initials,
            'officielename' => $firstname,
            'postcode' => $this->faker->postcode(),
            'streat' => $this->faker->streetName(),
            'housenumber' => $this->faker->buildingNumber(),
            'addition' => $this->faker->word(),
            'city' => $this->faker->city(),
        ];
    }
}
