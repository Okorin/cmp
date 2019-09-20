<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenteeCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentee_checkups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('participant_id');
            $table->foreign('participant_id')
                ->references('id')
                ->on('participants');

            $table->datetime('poked_at')->nullable();
            $table->enum('checkup_type', ['response', 'manual'])->nullable();
            $table->datetime('filled_at')->nullable();
            $table->string('status_comment', 1500)->nullable();
            $table->string('frequency_comment', 1500)->nullable();
            $table->string('progress_comment', 1500)->nullable();
            $table->string('extra_comment', 1500)->nullable();

            $table->unsignedInteger('supervisor_id')->nullable();
            $table->foreign('supervisor_id')
                ->references('id')
                ->on('users');

            $table->string('potential_problems', 1500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentee_checkups');
    }
}
