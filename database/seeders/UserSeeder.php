<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRepository::db()->truncate();
        UserRepository::db()->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("password1234")
        ]);
    }
}
