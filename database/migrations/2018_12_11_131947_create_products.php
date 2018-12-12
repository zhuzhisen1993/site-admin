<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catalog_id');
            $table->double('price');
            $table->string('name');
            $table->string('model');
            $table->string('sku');
            $table->text('describe');
            $table->text('content');
            $table->integer('isshow');
            $table->string('photo');
            $table->integer('num');
            $table->integer('sort');
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
