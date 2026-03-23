<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['name' => 'Arusha'],
            ['name' => 'Dar es Salaam'],
            ['name' => 'Dodoma'],
            ['name' => 'Geita'],
            ['name' => 'Iringa'],
            ['name' => 'Kagera'],
            ['name' => 'Katavi'],
            ['name' => 'Kigoma'],
            ['name' => 'Kilimanjaro'],
            ['name' => 'Lindi'],
            ['name' => 'Manyara'],
            ['name' => 'Mara'],
            ['name' => 'Mbeya'],
            ['name' => 'Morogoro'],
            ['name' => 'Mtwara'],
            ['name' => 'Mwanza'],
            ['name' => 'Njombe'],
            ['name' => 'Pemba Kaskazini'],
            ['name' => 'Pemba Kusini'],
            ['name' => 'Pwani'],
            ['name' => 'Rukwa'],
            ['name' => 'Ruvuma'],
            ['name' => 'Shinyanga'],
            ['name' => 'Simiyu'],
            ['name' => 'Singida'],
            ['name' => 'Songwe'],
            ['name' => 'Tabora'],
            ['name' => 'Tanga'],
            ['name' => 'Unguja Kaskazini'],
            ['name' => 'Unguja Kusini'],
            ['name' => 'Unguja Mjini Magharibi'],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }

        $this->command->info('Regions seeded successfully!');
    }
}
