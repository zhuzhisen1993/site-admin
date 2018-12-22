<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWebtitleProductCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_catalogs', function (Blueprint $table) {
            $table->string('webtitle');
            $table->text('webkeywords');
            $table->text('webdescription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_catalogs', function (Blueprint $table) {
            $table->dropColumn("products");
        });
    }
}
