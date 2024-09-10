<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['Software Developer', '3'],
            ['Applicatie Ontwikkelaar', '3'],
            ['Medewerker Beheer ICT', '2']
        ];
        for($i = 0; $i < count($courses); $i++) {
            DB::table('courses')->insert([
                'name' => $courses[$i][0],
                'years' => $courses[$i][1]
            ]);
        }
    }
}
