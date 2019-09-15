<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['role_id']);
            $table->dropColumn(['user_id', 'role_id']);
            $table->integer('mentor_id')->unsigned();
            $table->integer('mentee_id')->unsigned();
            $table->timestamp('ended_at')->nullable();
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
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn('ended_at');
            $table->dropColumn('verdict');
        });
    }
}
