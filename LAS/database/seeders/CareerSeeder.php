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
        $students = Student::all()->pluck('id')->toArray();
        $school_years = Schoolyear::all()->pluck('id')->toArray();

        // Create a weighted array where earlier years have higher chances
        $weighted_school_years = createWeightedArray($school_years);

        foreach ($students as $student_id) {
            // Randomly select a school year based on the weighted distribution
            $selected_school_year_id = $weighted_school_years[array_rand($weighted_school_years)];
            for ($i=1; $i < $selected_school_year_id + 1; $i++) { 
                DB::table('careers')->insert([
                    'student_id' => $student_id,
                    'schoolYear_id' => $i,
                    'course_id' => Course::all()->pluck('id')->random(),
                    'group_id' => Group::all()->pluck('id')->random(),
                    'startDate' => now(),
                    'endDate' => now(),
                ]);
            }
            
        }
    }
}
function createWeightedArray($school_years)
{
    $weighted = [];

    // Assign weights based on position, where earlier years have higher weights
    $total_years = count($school_years);
    
    for ($i = 0; $i < $total_years; $i++) {
        $weight = $total_years - $i; // Higher weight for earlier years
        for ($j = 0; $j < $weight; $j++) {
            $weighted[] = $school_years[$i];
        }
    }

    return $weighted;
}