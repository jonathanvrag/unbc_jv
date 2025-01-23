<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'last_name' => 'UNBC',
            'email' => 'user_unbc@unbc.com',
            'phone_number' => '3005308989',
            'password' => 'Qozaze-34',
        ]);
    }
}
