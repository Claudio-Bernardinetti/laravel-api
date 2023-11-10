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
            $newproject->repo_name = $faker->realText(50);
            $newproject->cover_image = 'storage_img/' .$faker->image('public/storage/storage_img', category: 'Posts', fullPath: true);
            $newproject->slug = Str::slug($newproject->title, '-');
            $newproject->content = $faker->realText();
            $newproject->description = $faker->realText();
            $newproject->save();
        }
    }
}
