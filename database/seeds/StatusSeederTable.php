<?php

use Illuminate\Database\Seeder;

class StatusSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'id' => 1,
            'status_name' => 'Order Placed',
        ]);
        DB::table('statuses')->insert([
            'id' => 2,
            'status_name' => 'Order Processing',
        ]);
        DB::table('statuses')->insert([
            'id' => 3,
            'status_name' => 'Order Delivered',
        ]);
        DB::table('statuses')->insert([
            'id' => 4,
            'status_name' => 'Order Canceled',
        ]);
    }
}
