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
            $table->bigIncrements('id_product');
            $table->string('product_name');
            $table->bigInteger('id_category')->unsigned();
            $table->longtext('product_desc');
            $table->integer('product_quantity');
            $table->bigInteger('product_price');
            $table->string('product_image');
            $table->timestamps();

            $table->foreign('id_category')->references('id_category')->on('category')
                ->onDelete('cascade')->onUpdate('cascade');
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
