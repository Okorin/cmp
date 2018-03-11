<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            // fields
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('gamemode_id')->unsigned();
            $table->integer('cycle_id')->unsigned();

            // Foreign key relations
            $table->foreign('user_id')    ->references('id')
                                          ->on('users');
            $table->foreign('role_id')    ->references('id')
                                          ->on('roles');
            $table->foreign('gamemode_id')->references('id')
                                          ->on('roles');
            $table->foreign('cycle_id')   ->references('id')
                                          ->on('cycles');

            // Any combination describes a User entity uniquely
            //$table->primary(['user_id', 'role_id', 'gamemode_id', 'cycle_id']);
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
        Schema::dropIfExists('participants');
    }
}
