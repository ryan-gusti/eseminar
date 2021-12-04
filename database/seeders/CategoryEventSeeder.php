<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Agama'],
            ['category_name' => 'Bisnis'],
            ['category_name' => 'Kesehatan'],
            ['category_name' => 'Musik'],
            ['category_name' => 'Pendidikan'],
            ['category_name' => 'Seni & Hiburan'],
            ['category_name' => 'Talk Show'],
            ['category_name' => 'Teknologi']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}