<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the courses table before seeding
        DB::table('courses')->truncate();

        // Seed some dummy courses
        DB::table('courses')->insert([
            'name' => 'Mathematics',
        ]);


    }
}
