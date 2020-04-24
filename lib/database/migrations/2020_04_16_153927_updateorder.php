<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updateorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->index()->unsigned();
            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
            $table->integer('product_id')->index()->default(0);
            $table->tinyInteger('qty')->default(0);
            $table->integer('price')->default(0);
            $table->tinyInteger('sale')->default(0);
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
    }
}
