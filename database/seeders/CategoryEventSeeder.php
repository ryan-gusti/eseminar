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
            [
                'name' => 'Agama',
                'slug' => 'agama',
                'image' => 'agama.jpg'
            ],
            [
                'name' => 'Bisnis',
                'slug' => 'bisnis',
                'image' => 'bisnis.jpg'
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'image' => 'kesehatan.jpg'
            ],
            [
                'name' => 'Musik',
                'slug' => 'musik',
                'image' => 'musik.jpg'
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'image' => 'pendidikan.jpg'
            ],
            [
                'name' => 'Seni & Hiburan',
                'slug' => 'seni-hiburan',
                'image' => 'seni-hiburan.jpg'
            ],
            [
                'name' => 'Talk Show',
                'slug' => 'talk-show',
                'image' => 'talk-show.jpg'
            ],
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'image' => 'teknologi.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}