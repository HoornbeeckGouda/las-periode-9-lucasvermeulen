<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 10 + 1; $i++) {
            DB::table('school_years')->insert([
                'year' => $i,
                'startDate' => now(),
                'endDate' => now()->addYear()
            ]);
        }
    }
}
