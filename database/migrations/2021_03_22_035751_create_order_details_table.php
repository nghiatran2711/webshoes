<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('orderDetailID');
            $table->unsignedBigInteger('orderID');
            $table->unsignedBigInteger('productID');
            $table->integer('quantity');
            $table->decimal('amount',$precision = 10, $scale = 0);
            $table->foreign('orderID')->references('orderID')->on('orders');
            $table->foreign('productID')->references('productID')->on('products');
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
        Schema::dropIfExists('order_details');
    }
}
