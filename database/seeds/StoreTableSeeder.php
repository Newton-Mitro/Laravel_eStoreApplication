<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'store_name' => 'eStore',
        ]);
        DB::table('stores')->insert([
            'store_name' => 'Fortune Technology',
        ]);
    }
}
