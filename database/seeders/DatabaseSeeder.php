<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
         DB::table('users')->insert([
            'name' => 'Test Admin1',
            'email' => 'admin1@email.com',
            'password' => bcrypt('admin@123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(25),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Test Admin2',
            'email' => 'admin2@email.com',
            'password' => bcrypt('admin@123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(25),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@email.com',
            'password' => bcrypt('user@123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(25),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@email.com',
            'password' => bcrypt('user@123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(25),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
