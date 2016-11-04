<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
         //
            Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id');
            $table->string('title');
            $table->string('title2');
            $table->string('user_id');
            $table->string('description');
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
         Schema::drop('transactions');
    }
}
