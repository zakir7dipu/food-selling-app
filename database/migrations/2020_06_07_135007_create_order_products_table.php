<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('country');
            $table->string('district');
            $table->string('thana');
            $table->string('home');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('product_sku');
            $table->integer('order_amount');
            $table->integer('order_qty');
            $table->boolean('approval')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
