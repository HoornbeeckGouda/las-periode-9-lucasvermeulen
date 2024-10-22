<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Teacher;

class models_rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        foreach (Student::all() as $student) {
            DB::table('model_has_roles')->insert([
                'role_id' => 4,
                'model_type' => 'App\Models\User',
                'model_id' => $student->user()->first()->id,
            ]);
        }
        foreach (Teacher::all() as $teacher) {
            DB::table('model_has_roles')->insert([
                'role_id' => 5,
                'model_type' => 'App\Models\User',
                'model_id' => $teacher->user()->first()->id,
            ]);
        }
        
    }
}
