<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the students table before seeding
        DB::table('students')->truncate();

        // Seed some dummy students
        DB::table('students')->insert([
            'name' => 'John Doe',
            'roll_number' => '12345',
            'password' => Hash::make('password123'),
        ]);

        // Add more students as needed

    }
}
