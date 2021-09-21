<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('user')->insert([
            'nama_user'     => 'superadmin',
            'email'         => Str::random(10).'@gmail.com',
            'username'      => 'superadmin',
            'password'      => Hash::make('password'),
            'id_role'       => 1
        ]);
    }
}
