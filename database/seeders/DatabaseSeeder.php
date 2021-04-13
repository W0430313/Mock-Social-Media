<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator',
            'description' => 'manages user roles',
            'created_at' => Carbon::now('America/Halifax')

        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'manages everything',
            'created_at' => Carbon::now('America/Halifax')
        ]);
        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'description' => 'manages themes',
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('users')->insert([
            'name' => 'Jane UserAdmin',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('users')->insert([
            'name' => 'Bob Moderator',
            'email' => 'bob@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('users')->insert([
            'name' => 'Susan ThemeAdmin',
            'email' => 'susan@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
            'created_at' => Carbon::now('America/Halifax'),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3,
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('themes')->insert([
            'name' => 'minty',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/minty/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => Carbon::now('America/Halifax')
        ]);

        DB::table('themes')->insert([
            'name' => 'darkly',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => Carbon::now('America/Halifax')
        ]);
    }
}
