<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRafflesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->unsignedInteger('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->date('end_date');
            $table->date('draw_date');
            $table->text('draw_location');
            $table->integer('max_tickets')->nullable();
            $table->decimal('price', 9, 2);
            $table->json('discount')->nullable();
            $table->enum('status', ['Draft', 'Current', 'Previous'])->default('Draft');
            $table->unsignedInteger('user_id'); // created by
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
        Schema::dropIfExists('raffles');
    }
}
