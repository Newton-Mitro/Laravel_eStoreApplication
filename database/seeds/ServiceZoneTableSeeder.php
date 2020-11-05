<?php

use Illuminate\Database\Seeder;

class ServiceZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Banirchor',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Jalirpar',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Kalligram',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Tekerhat',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Talbari',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Vannabari',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Satpar',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Nonikhir',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Mukshudpur',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Boilotoli',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Bongram',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Arpara',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Gopalgonj Police Line',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Gatepara',
        ]);
        DB::table('service_zones')->insert([
            'store_id' => 1,
            'zone_name' => 'Gopaljanj Sadar Thana',
        ]);
    }
}
