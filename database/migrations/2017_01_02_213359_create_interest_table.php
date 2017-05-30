<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('product_id');
            $table->string('product_name');
            
            
            
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