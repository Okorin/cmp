<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
    	$this->call(RolesTableSeeder::class);
        $this->call(GamemodeTableSeeder::class);
        $this->call(CyclesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(ParticipantsTableSeeder::class);

    }
}
