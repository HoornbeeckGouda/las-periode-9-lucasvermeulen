<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(10)->create()->each(function ($student) {
            $user = User::factory()->create([
                'name' => $student->firstname,
                'email' => $student->firstname . '.' . $student->lastname . '@laravel.com',
                'password' => 'geheim',
            ]);
            // $student->user()->save($user);
            $student->update(['user_id' => $user->id]);
        });
    }
}