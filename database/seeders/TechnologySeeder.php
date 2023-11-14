<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techonologies = ['HTML', 'CSS', 'JS', 'Bootstrap', 'VueJs', 'mySql', 'php', 'Laravel'];

        foreach ($techonologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($technology, '-');
            $new_technology->save();
        }
    }
}
