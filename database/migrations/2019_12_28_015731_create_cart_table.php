<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id_cart');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_product')->unsigned();
            $table->integer('cart_quantity')->default(0);
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_product')->references('id_product')->on('products')
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
        Schema::dropIfExists('cart');
    }
}
