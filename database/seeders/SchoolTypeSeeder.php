<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Government', 'description' => 'Government-owned public schools', 'order' => 1],
            ['name' => 'Private', 'description' => 'Private-owned schools', 'order' => 2],
            ['name' => 'Faith-based', 'description' => 'Religious institution-owned schools', 'order' => 3],
            ['name' => 'Community', 'description' => 'Community-owned schools', 'order' => 4],
        ];

        foreach ($types as $type) {
            DB::table('school_types')->insert($type);
        }

        $this->command->info('School types seeded successfully!');
    }
}
