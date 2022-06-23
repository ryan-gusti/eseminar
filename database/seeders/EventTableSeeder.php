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
                'banner' => 'banner-event-offline.jpeg',
                'quota' => 200,
                'time' => date('Y-m-d H:i:s', time()),
                'location_link' => 'Jalan A. Yani No.29, Tanjungpura, Kec. Karawang Bar., Kabupaten Karawang, Jawa Barat 41315',
                'price' => 100000,
                'status' => 'open',
                'type' => 'offline',
                'code_presence' => 'w6y8g8c0r6'
            ],
            [
                'title' => 'Coba Event Online',
                'user_id' => 2,
                'slug' => Str::slug('Coba Event Online', '-'),
                'description' => base64_encode('Ini Deskripsi'),
                'banner' => 'banner-event-online.jpeg',
                'quota' => 400,
                'time' => date('Y-m-d H:i:s', time()),
                'location_link' => 'https://s.id/linkzoom',
                'price' => 0,
                'type' => 'online',
                'status' => 'open',
                'code_presence' => 'j4o0u6b2v7'
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}