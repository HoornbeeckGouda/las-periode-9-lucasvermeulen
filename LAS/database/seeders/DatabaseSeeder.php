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
            DB::table('cursusjaars')->insert([
                'cursusjaar' => $i,
                'begindatum' => now(),
                'einddatum' => now()->addYear()
            ]);
        }
        Student::factory(10)->create();

        $opleidingen = [
            'Software Developer',
            'Applicatie Ontwikkelaar',
            'Medewerker Beheer ICT'
        ];
        for($i = 0; $i < count($opleidingen); $i++) {
            DB::table('opleidings')->insert([
                'naam' => $opleidingen[$i],
            ]);
        }
        $klassnaam = [
            'T4I1AD',
            'T4I1BD',
            'T4I2AD',
            'T4I2BD',
            'T4I3AD',
            'T4I3BD'
        ];
        for($i = 0; $i < count($klassnaam); $i++) {
            DB::table('klas')->insert([
                'naam' => $klassnaam[$i],
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
        
        
       
        // Extract the first letters of each word in the opleiding name
      
    }
}
