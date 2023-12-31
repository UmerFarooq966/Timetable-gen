<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classes;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin_password'),
            'roll_number' => 'admin123',
            'type' => 1,
        ]);

        Course::create([
            'name' => 'Mathematics',
        ]);

        Classes::create([
            'course_id' => 1, // Assuming Mathematics course
            'start_time' => '2023-01-01 09:00:00',
            'end_time' => '2023-01-01 10:30:00',
        ]);

    }
}
