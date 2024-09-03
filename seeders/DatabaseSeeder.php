<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\klas;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Opleiding;

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
            'password' => 'geheim'
        ]);
        for($i = 1; $i < 10 + 1; $i++) {
            DB::table('schoolyears')->insert([
                'schoolyear' => $i,
                'startDate' => now(),
                'endDate' => now()->addYear()
            ]);
        }
        Student::factory(10)->create();

        $courses = [
            'Software Developer',
            'Applicatie Ontwikkelaar',
            'Medewerker Beheer ICT'
        ];
        for($i = 0; $i < count($courses); $i++) {
            DB::table('courses')->insert([
                'name' => $courses[$i],
            ]);
        }
        $className = [
            'T4I1AD',
            'T4I1BD',
            'T4I2AD',
            'T4I2BD',
            'T4I3AD',
            'T4I3BD'
        ];
        for($i = 0; $i < count($className); $i++) {
            DB::table('schoolclasses')->insert([
                'name' => $className[$i],
            ]);
        }
        $vakken = [
            'PGB',
            'PGF',
            'SWO',
            'ENG',
            'NL',
            'ABT',
            'PTR',
            'GDT'
        ];
        for($i = 0; $i < count($vakken); $i++) {
            DB::table('vaks')->insert([
                'naam' => $vakken[$i],
            ]);
        }
      
    }
}
