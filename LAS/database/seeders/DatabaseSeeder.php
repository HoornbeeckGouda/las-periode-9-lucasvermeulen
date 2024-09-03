<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\SubjectGrade;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'lucas',
            'email' => 'lucas.a.vermeulen@gmail.com',
            'password' => 'geheim',
        ]);
        
        $this->call([
            CareerSeeder::class,
            CourseSeeder::class,
            CourseSubjectSeeder::class,
            GroupSeeder::class,
            SchoolyearSeeder::class,
            StudentSeeder::class,
            SubjectGradeSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
