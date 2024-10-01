<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $className = [
            ['T4I1AD', 1,1],
            ['T4I1BD', 1,2],
            ['T4I2AD', 2,1],
            ['T4I2BD', 2,2],
            ['T4I3AD', 3,1],
            ['T4I3BD', 3,2]
        ];
        for($i = 0; $i < count($className); $i++) {
           
            DB::table('groups')->insert([
                'name' => $className[$i][0],
                'schoolYear_id' => $className[$i][1],
                'course_id' => $className[$i][2],
            ]);
        }
    }
}
