<?php

namespace Database\Seeders;

use App\Models\ExamType;
use Illuminate\Database\Seeder;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Mock',
                'slug' => 'mock',
                'description' => 'Mock examinations and internal assessments.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Joint',
                'slug' => 'joint',
                'description' => 'Joint examinations across schools/councils.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Midterm',
                'slug' => 'midterm',
                'description' => 'Midterm examinations.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Annual',
                'slug' => 'annual',
                'description' => 'Annual examinations.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($types as $t) {
            ExamType::updateOrCreate(
                ['slug' => $t['slug']],
                $t
            );
        }
    }
}
