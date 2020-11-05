<?php

use Illuminate\Database\Seeder;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Fruits and Vegetables',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Meat and Fish',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Cooking',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Beverages',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Health Products',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Pet Care',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Baby Care',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Breakfast',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Bread & Bakery',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Baking Needs',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Home and Cleaning',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Office Products',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Beauty Products',
            'category_image' => 'url',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Home Appliances',
            'category_image' => 'url',
        ]);

    }
}
