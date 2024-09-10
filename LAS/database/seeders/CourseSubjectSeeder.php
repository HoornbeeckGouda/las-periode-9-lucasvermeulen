<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Subject;
class CourseSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all()->pluck('id')->toArray();
        $subjects = Subject::all()->pluck('id')->toArray();
        foreach ($courses as $course_id) {
            foreach ($subjects as $subject_id) {
                DB::table('course_subjects')->insert([
                    'course_id' => $course_id,
                    'subject_id' => $subject_id,
                ]);
            }
        }
    }
}
