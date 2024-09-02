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
            'roepnaam' => $firstname,
            'tussenvoegsel' => '',
            'achternaam' => $lastname,
            'voorletters' => $initials,
            'officielenaam' => $firstname,
            'postcode' => $this->faker->postcode(),
            'straat' => $this->faker->streetName(),
            'huisnummer' => $this->faker->buildingNumber(),
            'toevoeging' => $this->faker->word(),
            'woonplaats' => $this->faker->city(),
        ];
    }
}
