<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Event;


class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Coba Event Offline',
                'user_id' => 3,
                'slug' => Str::slug('Coba Event Offline', '-'),
                'description' => base64_encode('Ini Deskripsi'),
                'banner' => 'banner-offline.png',
                'quota' => 200,
                'time' => date('Y-m-d H:i:s', time()),
                'location' => 'Hotel Test',
                'price' => 100000,
                'status' => 'open'
            ],
            [
                'title' => 'Coba Event Online',
                'user_id' => 2,
                'slug' => Str::slug('Coba Event Online', '-'),
                'description' => base64_encode('Ini Deskripsi'),
                'banner' => 'banner-online.png',
                'quota' => 400,
                'time' => date('Y-m-d H:i:s', time()),
                'link' => 'https://s.id/linkzoom',
                'price' => 50000,
                'status' => 'open'
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}