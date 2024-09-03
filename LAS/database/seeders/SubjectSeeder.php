<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subject = [
            'PGB',
            'PGF',
            'SWO',
            'ENG',
            'NL',
            'ABT',
            'PTR',
            'GDT'
        ];
        for($i = 0; $i < count($subject); $i++) {
            DB::table('subjects')->insert([
                'name' => $subject[$i],
            ]);
        }
    }
}
