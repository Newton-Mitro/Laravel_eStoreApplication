<?php

use Illuminate\Database\Seeder;

class ShippingDiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_discounts')->insert([
            'cart_total' => 0,
            'discount_amount' => 0,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 250,
            'discount_amount' => 10,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 500,
            'discount_amount' => 20,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 750,
            'discount_amount' => 30,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 1000,
            'discount_amount' => 40,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 1250,
            'discount_amount' => 50,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 1500,
            'discount_amount' => 60,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 1750,
            'discount_amount' => 70,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 2000,
            'discount_amount' => 80,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 2250,
            'discount_amount' => 90,
        ]);
        DB::table('shipping_discounts')->insert([
            'cart_total' => 2500,
            'discount_amount' => 1000,
        ]);
    }
}
