<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'  => 'admin',
                'password'  => bcrypt('password'),
                'nama'      => 'Administrator',
                'email'     => 'admin@gmail.com',
                'role'      => 'admin',
            ],
            [
                'username'  => 'myuser',
                'password'  => bcrypt('password'),
                'nama'      => 'User',
                'email'     => 'myuser@gmail.com',
                'role'      => 'user',
            ],
        ]);
    }
}
