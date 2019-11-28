<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_name');
            $table->string('cat_id');
            $table->integer('brand_id');
            $table->text('product_short_desc');
            $table->text('product_long_desc');
            $table->float('discount_price',10,2);
            $table->float('product_price',10,2);
            $table->string('product_image');
            $table->string('multiple_image');
            $table->integer('quantity');
            $table->string('size');
            $table->tinyInteger('status');
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
