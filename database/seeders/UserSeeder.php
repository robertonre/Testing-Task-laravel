<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@niv.al',
            'password' => Hash::make('password'),
            'api_token' => Str::random(80),
        ]);
    }
}
