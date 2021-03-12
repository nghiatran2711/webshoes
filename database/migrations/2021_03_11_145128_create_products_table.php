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
            $table->bigIncrements('productID');
            $table->string('productName');
            $table->string('description');
            $table->string('image');
            $table->unsignedBigInteger('categoryID');
            $table->unsignedBigInteger('brandID');
            $table->decimal('price');
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade');
            $table->foreign('brandID')->references('brandID')->on('brands')->onDelete('cascade');          
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
