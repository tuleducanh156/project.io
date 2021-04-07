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
            $table->id();
            $table->unsignedInteger('id_member');
            $table->string('name');
            $table->string('price');
            $table->unsignedInteger('category');
            $table->unsignedInteger('brand');
            $table->unsignedInteger('sale');
            $table->unsignedInteger('num-sale')->nullable();
            $table->string('namecompany');
            $table->string('detail');
            $table->string('image')->nullable();
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
