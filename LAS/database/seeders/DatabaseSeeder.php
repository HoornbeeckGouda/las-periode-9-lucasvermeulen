<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Student;
use App\Models\SubjectGrade;
use App\Models\Teacher;
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

        
        
        $this->call([
            RoleSeeder::class,
            CareerSeeder::class,
            CourseSeeder::class,
            CourseSubjectSeeder::class,
            SchoolyearSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            SubjectGradeSeeder::class,
            SubjectSeeder::class,
            TeacherSeeder::class,
        ]);
        User::factory()->create([
            'role_id' => '1',
            'name' => 'lucas',
            'email' => 'lucas.a.vermeulen@gmail.com',
            'password' => 'geheim',
        ]);
        // $students = Student::all();
        // foreach ($students as $student) {

        //     $user = User::factory()->create([
        //         'name' => $student->firstname,
        //         'email' => $student->fistname , $student->lastname ,'@larvel.com',
        //         'password' => 'geheim',
        //     ]);
        //     $student->update(['user_id'=>$user->id]);

        // }
        
        
    }
}
