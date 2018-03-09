<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('starts_at');
            $table->datetime('ends_at');
            $table->datetime('mentor_signups_start_at');
            $table->datetime('mentor_signups_end_at');
            $table->datetime('mentee_signups_start_at');
            $table->datetime('mentee_signups_end_at');
            $table->string('name', 25)->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('cycles');
    }
}
