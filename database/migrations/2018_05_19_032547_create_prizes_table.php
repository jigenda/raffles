<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('raffle_id');
            $table->foreign('raffle_id')->references('id')->on('raffles');
            $table->integer('prize_number');
            $table->string('name');
            $table->text('description');
            $table->decimal('value', 9, 2);
            $table->string('image');
            $table->unsignedInteger('user_id'); //creator
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('prizes');
    }
}
