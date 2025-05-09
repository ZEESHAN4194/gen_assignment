<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Web Development',
                'description' => 'Learn HTML, CSS, JavaScript and Laravel.',
                'fees' => 1,
                'duration' => 1,
                'thumbnail' => 'download.jpeg',
            ],
            [
                'name' => 'Data Science',
                'description' => 'Python, Machine Learning and Data Analysis.',
                'fees' => 2,
                'duration' => 2,
                'thumbnail' => 'datasci.png',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Flutter and React Native for building mobile apps.',
                'fees' => 3,
                'duration' => 1,
                'thumbnail' => 'mobile.jpeg',
            ],
        ];

        foreach ($courses as $data) {
            Course::create($data);
        }
    }
}
