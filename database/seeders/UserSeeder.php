<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                // Admin
                'name' => 'Admin',
                'phone' => '085155158668',
                'email' => 'admin@admin.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => bcrypt('test12345'),
                'role' => 'admin',
            ],
            [
                // Partner
                'name' => 'Budi',
                'phone' => '089616038162',
                'email' => 'partner@partner.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => bcrypt('test12345'),
                'role' => 'partner',
            ],
            [
                'name' => 'Andi',
                'phone' => '085223214618',
                'email' => 'partner2@partner.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => bcrypt('test12345'),
                'role' => 'partner',
            ],
            [
                'name' => 'Juned',
                'phone' => '08993773932',
                'email' => 'partner3@partner.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => bcrypt('test12345'),
                'role' => 'partner',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
