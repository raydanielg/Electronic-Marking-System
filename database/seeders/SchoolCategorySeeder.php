<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Nursery', 'description' => 'Pre-primary education for children aged 3-5 years', 'order' => 1],
            ['name' => 'Primary', 'description' => 'Primary education from Standard 1 to Standard 7', 'order' => 2],
            ['name' => 'Secondary', 'description' => 'Secondary education from Form 1 to Form 6', 'order' => 3],
            ['name' => 'College', 'description' => 'Higher learning institutions and colleges', 'order' => 4],
            ['name' => 'Vocational', 'description' => 'Vocational training centers', 'order' => 5],
        ];

        foreach ($categories as $category) {
            DB::table('school_categories')->insert($category);
        }

        $this->command->info('School categories seeded successfully!');
    }
}
