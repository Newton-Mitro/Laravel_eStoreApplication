<?php

use Illuminate\Database\Seeder;

class ProductSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker1 = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker1);
        foreach (range(1,500) as $index) {
            DB::table('products')->insert([
                'brand_id' => $faker->numberBetween(1, 40),
                'product_code' => $faker->unique()->numberBetween(10000,99999),
                'subcategory_id' => $faker->numberBetween(1, 90),
                'product_name' => $faker1->productName(),
                'product_image' => $faker->imageUrl(),
                'tag_price' => $faker->numberBetween(50, 2000),
                'sale_price' => $faker->numberBetween(50, 2000),
                'product_long_description' => $faker->sentence($nbWords = 70, $variableNbWords = true),
                'has_offer' => $faker->numberBetween(0, 1),
                'featured'=>$faker->numberBetween(0, 1),
                'product_status' => 1,
            ]);
        }

    }
}
