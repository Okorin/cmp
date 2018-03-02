<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique();
            $table->string('description')->nullable();         // Role description on a role page
            $table->boolean('cycle_bindable')->default(FALSE); // Role can be bound to cycles
            $table->boolean('visible')->default(true);         // Role page is publicly accessable
            $table->smallInteger('hierarchy')->unique();       // determines which role takes precedence for visible user attributes
            $table->string('color', 6);                        // color of the role
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
        Schema::dropIfExists('roles');
    }
}
