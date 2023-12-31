<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the classes table before seeding
        DB::table('classes')->truncate();

        // Seed some dummy classes
        DB::table('classes')->insert([
            'course_id' => 1, // Assuming Mathematics course
            'start_time' => '2023-01-01 09:00:00',
            'end_time' => '2023-01-01 10:30:00',
        ]);

    }
}
