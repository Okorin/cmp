<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_signups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('gamemode_id')->unsigned();
            $table->timestamp('valid_until')->nullable();
            $table->enum('verdict',['accept', 'decline', 'none'])->default('none');
            $table->enum('modding_abilities_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding'])->nullable();;
            $table->string('modding_abilities_reasoning')->nullable();;
            $table->enum('modding_activity_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding'])->nullable();;
            $table->string('modding_activity_reasoning')->nullable();
            $table->enum('mapping_abilities_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding'])->nullable();;
            $table->string('mapping_abilities_reasoning')->nullable();;
            $table->enum('other_materials_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding'])->nullable();
            $table->string('other_materials_reasoning')->nullable();
            $table->enum('general_behaviour', ['Bad', 'Questionable', 'Inconsistent', 'Good'])->nullable();
            $table->string('general_behaviour_reasoning')->nullable();
            $table->enum('reliability', ['Bad', 'Questionable', 'Inconsistent', 'Good'])->nullable();
            $table->string('reliability_reasoning')->nullable();
            $table->enum('past_issues', ['None', 'Few', 'Many'])->nullable();
            $table->string('past_issues_reasoning')->nullable();
            $table->string('timezone');
            $table->string('other_languages')->nullable();
            $table->string('availability');
            $table->string('preferred_communication');
            $table->string('preferred_genres');
            $table->string('mod_1');
            $table->string('mod_2');
            $table->string('mod_3');
            $table->string('previous_experience')->nullable();
            $table->string('mapping_style');
            $table->string('what_to_expect');
            $table->string('what_you_look_for');
            $table->enum('tier_level', [0, 1, 2]);
            $table->enum('max_mentees', [1, 2, 3]);
            $table->string('other_materials')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_signups');
    }
}
