<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenteeSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentee_signups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('gamemode_id')->unsigned();
            $table->timestamp('valid_until')->nullable();
            $table->string('mapping_for');
            $table->boolean('ranked_maps');
            $table->string('timezone');
            $table->string('availability');
            $table->string('preferred_communication');
            $table->integer('mentor_preference1')->unsigned()->nullable();
            $table->integer('mentor_preference2')->unsigned()->nullable();
            $table->string('reasoning')->nullable();
            $table->string('why_improve');
            $table->string('what_improve');
            $table->string('favourite_mappers')->nullable();
            $table->string('preferred_genres')->nullable();
            $table->string('map_showcase')->nullable();
            $table->string('other_languages')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentee_signups');
    }
}
