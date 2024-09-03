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
            'T4I1AD',
            'T4I1BD',
            'T4I2AD',
            'T4I2BD',
            'T4I3AD',
            'T4I3BD'
        ];
        for($i = 0; $i < count($className); $i++) {
            DB::table('groups')->insert([
                'name' => $className[$i],
            ]);
        }
    }
}
