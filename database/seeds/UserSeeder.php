<?php

use Illuminate\Database\Seeder;

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
            'role_id' => 1,
            'name' => 'Super Admin',
            'phone' => '01700-000001',
            'email' => 'super.admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('super.admin@email.com'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Site Administrator',
            'email' => 'site.admin@email.com',
            'phone' => '01700-000002',
            'email_verified_at' => now(),
            'password' => bcrypt('site.admin@email.com'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'name' => 'Customer',
            'phone' => '01700-000003',
            'email' => 'customer@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('customer@email.com'),
            'remember_token' => Str::random(10),
        ]);



//        factory(App\User::class, 20)->create();
    }
}
