<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('user')->insert([
        //     'nama_user'     => Str::random(10),
        //     'email'         => Str::random(10).'@gmail.com',
        //     'username'      => Str::random(10),
        //     'password'      => Hash::make('password'),
        //     'id_role'       => 1
        // ]);
    }
}