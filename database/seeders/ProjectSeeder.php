<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 17; $i++) { 
            $newproject = new Project();
            $newproject->title = $faker->realText(50);
            $newproject->github_link = 'https://github.com/Claudio-Bernardinetti';
            $newproject->internet_link = 'https://www.google.com';
            $newproject->cover_image = $faker->imageUrl(360, 360, 'project', true);
            $newproject->slug = Str::slug($newproject->title, '-');
            $newproject->content = $faker->realText();
            $newproject->description = $faker->realText();
            $newproject->save();
        }
    }
}
