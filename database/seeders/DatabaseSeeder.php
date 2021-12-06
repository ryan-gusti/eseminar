<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EventTableSeeder::class,
            CategoryEventSeeder::class,
            AdminUserSeeder::class
        ]);
        \App\Models\Event::factory(10)->create();
    }
}