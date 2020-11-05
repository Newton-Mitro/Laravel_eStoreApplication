<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_code',100)->unique();
            $table->double('tag_price');
            $table->double('sale_price');
            $table->string('product_image');
            $table->boolean('has_offer')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('product_status')->default(true);
            $table->longText('product_short_description')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->string('product_height',12)->nullable();
            $table->string('product_width',12)->nullable();
            $table->string('product_weight',12)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
