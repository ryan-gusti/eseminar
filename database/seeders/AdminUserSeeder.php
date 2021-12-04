<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
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
                'name' => 'Admin',
                'phone' => '085155158668',
                'email' => 'admin@admin.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => bcrypt('test12345'),
                'picture' => 'foto.png',
                'is_admin' => true,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
