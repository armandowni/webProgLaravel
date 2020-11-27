<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->bigInteger('id_user')->unsigned();
            $table->integer('order_quantity');
            $table->integer('transaction_done')->default(0);
            $table->string('product_name');
            $table->bigInteger('product_price');
            $table->string('product_image');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users')
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
        Schema::dropIfExists('order');
    }
}
