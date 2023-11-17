<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categories_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_description');
            $table->integer('product_quantity');
            $table->string('product_image');
            $table->integer('admin')->default('1');
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('amazon_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amazon_products');
    }
}
