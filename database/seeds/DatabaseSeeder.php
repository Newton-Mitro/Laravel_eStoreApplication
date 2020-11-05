<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            BrandSeederTable::class,
            CategorySeederTable::class,
            SubcategoriesTableSeeder::class,
            ProductSeederTable::class,
            StatusSeederTable::class,
            StoreTableSeeder::class,
            ServiceZoneTableSeeder::class,
            ShippingDiscountTableSeeder::class,
        ]);
    }
}
