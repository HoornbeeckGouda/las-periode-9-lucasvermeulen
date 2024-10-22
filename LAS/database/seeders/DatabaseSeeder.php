<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Student;
use App\Models\SubjectGrade;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        
        
        $this->call([
            CourseSeeder::class,
            CourseSubjectSeeder::class,
            SchoolyearSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            SubjectGradeSeeder::class,
            SubjectSeeder::class,
            TeacherSeeder::class,
            CareerSeeder::class,
            models_rolesSeeder::class

        ]);
        User::factory()->create([
            'name' => 'lucas',
            'email' => 'lucas.a.vermeulen@gmail.com',
            'password' => 'geheim',
        ]);

       
        
    }
}
