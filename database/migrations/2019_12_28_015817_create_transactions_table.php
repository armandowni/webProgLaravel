<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id_transaction');
            $table->bigInteger('id_order')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->integer('transaction_done')->default(0);
            $table->timestamps();
            $table->foreign('id_order')->references('id_order')->on('order')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
