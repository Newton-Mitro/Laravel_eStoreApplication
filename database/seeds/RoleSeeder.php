<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => "Super Admin",
            'display_name' => "Super Administrator",
        ]);
        DB::table('roles')->insert([
            'role_name' => "Site Admin",
            'display_name' => "Site Administrator",
        ]);
        DB::table('roles')->insert([
            'role_name' => "Customer",
            'display_name' => "Customer",
        ]);
    }
}
