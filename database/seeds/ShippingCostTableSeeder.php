<?php

use Illuminate\Database\Seeder;

class ShippingCostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 1,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 2,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 3,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 4,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 5,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 6,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 7,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 8,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 9,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 10,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 11,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 12,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 13,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 14,
            'on_amount' => 999,
            'cost' => 20,
        ]);
        DB::table('service_zones')->insert([
            'shipping_zone_id' => 15,
            'on_amount' => 999,
            'cost' => 20,
        ]);
    }
}
