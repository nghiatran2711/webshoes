<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('orderID');
            $table->unsignedBigInteger('customerID');
            $table->string('fullName');
            $table->integer('numberPhone');
            $table->string('address');
            $table->datetime('date_order');
            $table->datetime('date_ship');
            $table->decimal('total_order',$precision = 10, $scale = 0);
            $table->integer('status')->default(null);
            $table->foreign('customerID')->references('customerID')->on('customers');
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
        Schema::dropIfExists('orders');
    }
}
