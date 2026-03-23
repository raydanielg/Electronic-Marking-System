<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            // Nursery
            ['name' => 'Baby Class', 'education_type' => 'Nursery', 'sort_order' => 1],
            ['name' => 'Middle Class', 'education_type' => 'Nursery', 'sort_order' => 2],
            ['name' => 'Pre-Unit', 'education_type' => 'Nursery', 'sort_order' => 3],
            
            // Primary
            ['name' => 'Standard 1', 'education_type' => 'Primary', 'sort_order' => 1],
            ['name' => 'Standard 2', 'education_type' => 'Primary', 'sort_order' => 2],
            ['name' => 'Standard 3', 'education_type' => 'Primary', 'sort_order' => 3],
            ['name' => 'Standard 4', 'education_type' => 'Primary', 'sort_order' => 4],
            ['name' => 'Standard 5', 'education_type' => 'Primary', 'sort_order' => 5],
            ['name' => 'Standard 6', 'education_type' => 'Primary', 'sort_order' => 6],
            ['name' => 'Standard 7', 'education_type' => 'Primary', 'sort_order' => 7],
            
            // Secondary
            ['name' => 'Form I', 'education_type' => 'Secondary', 'sort_order' => 1],
            ['name' => 'Form II', 'education_type' => 'Secondary', 'sort_order' => 2],
            ['name' => 'Form III', 'education_type' => 'Secondary', 'sort_order' => 3],
            ['name' => 'Form IV', 'education_type' => 'Secondary', 'sort_order' => 4],
            ['name' => 'Form V', 'education_type' => 'Secondary', 'sort_order' => 5],
            ['name' => 'Form VI', 'education_type' => 'Secondary', 'sort_order' => 6],
        ];

        foreach ($levels as $level) {
            \App\Models\AcademicLevel::updateOrCreate(
                ['name' => $level['name'], 'education_type' => $level['education_type']],
                ['sort_order' => $level['sort_order']]
            );
        }
    }
}
