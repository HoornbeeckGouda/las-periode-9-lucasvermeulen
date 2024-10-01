<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::factory(10)->create()->each(function ($teacher) {
            $user = User::factory()->create([
                'role_id' => '2',
                'name' => $teacher->firstname,
                'email' => $teacher->firstname . '.' . $teacher->lastname . '@laravel.com',
                'password' => 'geheim',
            ]);
            // $teacher->user()->save($user);
            $teacher->update(['user_id' => $user->id]);
        });
    }
}
