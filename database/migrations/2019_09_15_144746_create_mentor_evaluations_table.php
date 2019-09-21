<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('mentor_signup_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('modding_abilities_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding']);
            $table->string('modding_abilities_reasoning');
            $table->enum('modding_activity_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding']);
            $table->string('modding_activity_reasoning')->nullable();
            $table->enum('mapping_abilities_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding']);
            $table->string('mapping_abilities_reasoning');
            $table->enum('other_materials_rating', ['Very Poor', 'Poor', 'Average', 'Good', 'Outstanding'])->nullable();
            $table->string('other_materials_reasoning')->nullable();
            $table->enum('general_behaviour', ['Bad', 'Questionable', 'Inconsistent', 'Good'])->nullable();
            $table->string('general_behaviour_reasoning')->nullable();
            $table->enum('reliability', ['Bad', 'Questionable', 'Inconsistent', 'Good'])->nullable();
            $table->string('reliability_reasoning')->nullable();
            $table->enum('past_issues', ['None', 'Few', 'Many'])->nullable();
            $table->string('past_issues_reasoning')->nullable();
            $table->enum('verdict',['accept', 'decline', 'none'])->default('none');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_evaluations');
    }
}
