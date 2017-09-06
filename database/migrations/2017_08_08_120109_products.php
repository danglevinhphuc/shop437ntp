<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('ten');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade');
            $table->integer('id_categorychild')->unsigned();
            $table->foreign('id_categorychild')->references('id')->on('categorychild')->onDelete('cascade')->nullable();;
            $table->integer('id_event')->unsigned();
            $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade')->nullable();;
            $table->longText('description')->nullable();
            $table->float('unit_price',16,2);
            $table->float('promotion_price',16,2)->nullable();
            $table->integer('new');
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
        //
        Schema::drop('products');
    }
}
