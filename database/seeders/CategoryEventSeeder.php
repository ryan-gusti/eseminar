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
                'title' => 'Agama',
                'slug' => 'agama',
                'image' => 'agama.jpg'
            ],
            [
                'title' => 'Bisnis',
                'slug' => 'bisnis',
                'image' => 'bisnis.jpg'
            ],
            [
                'title' => 'Kesehatan',
                'slug' => 'kesehatan',
                'image' => 'kesehatan.jpg'
            ],
            [
                'title' => 'Musik',
                'slug' => 'musik',
                'image' => 'musik.jpg'
            ],
            [
                'title' => 'Pendidikan',
                'slug' => 'pendidikan',
                'image' => 'pendidikan.jpg'
            ],
            [
                'title' => 'Seni & Hiburan',
                'slug' => 'seni-hiburan',
                'image' => 'seni-hiburan.jpg'
            ],
            [
                'title' => 'Talk Show',
                'slug' => 'talk-show',
                'image' => 'talk-show.jpg'
            ],
            [
                'title' => 'Teknologi',
                'slug' => 'teknologi',
                'image' => 'teknologi.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}