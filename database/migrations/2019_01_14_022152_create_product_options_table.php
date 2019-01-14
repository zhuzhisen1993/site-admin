<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('product_option_id');
            $table->integer('option_id');
            $table->integer('required');
            $table->integer('option_value_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('price_prefix');
            $table->integer('weight');
            $table->string('wight_prefix');
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
        Schema::dropIfExists('product_options');
    }
}
