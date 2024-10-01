<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = Subject::all();
        return [
            'user_id' => null,
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'initials' => $this->faker->word(),
            'officielename' => $this->faker->name(),
            'postcode' => $this->faker->postcode(),
            'streat' => $this->faker->streetName(),
            'housenumber' => $this->faker->buildingNumber(),
            'addition' => $this->faker->word(),
            'city' => $this->faker->city(),
            'subject_id' => $subjects->random()->id,
        ];
    }
}
