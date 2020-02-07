<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_no' => '01911111111',
            'password' => bcrypt('111111'),
            'email_verified_at' => now(),
            'role' => 1,
            'photo' => null
        ]);
    }
}
