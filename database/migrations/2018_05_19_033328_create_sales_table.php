<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('raffle_id');
            $table->foreign('raffle_id')->references('id')->on('raffles');
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('buyer_mobile');
            $table->integer('number_tickets');
            $table->decimal('amount', 8, 2);
            $table->boolean('susbcribe')->default(true);
            $table->enum('status', ['Unpaid', 'Paid'])->default('Unpaid');
            $table->unsignedInteger('user_id'); // creator
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sales');
    }
}
