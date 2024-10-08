<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Schoolyear;
use App\Models\Course;
use App\Models\Group;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();
      

        foreach ($students as $student) {
            DB::table('careers')->insert([
                'student_id' => $student->id,
                'schoolYear_id' => 1,
                'course_id' => Course::all()->pluck('id')->random(),
                'group_id' => Group::all()->pluck('id')->random(),
                'startDate' => now(),
                'endDate' => null,
            ]);  
        }
    }
}
