<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::create([
    		'name' => 'Admin',
    		'color' => 'f6f6f6',
    		'visible' => false,
    		'hierarchy' => 99,
    	]);

    	Role::create([
    		'name' => 'Organizer',
    		'color' => 'ff93c9',
    		'hierarchy' => 1,
    	]);

        Role::create([
        	'name' => 'Mentor',
        	'cycle_bindable' => true,
        	'color' => '538aff',
        	'hierarchy' => 2,
        ]);

        Role::create([
        	'name' => 'Mentee',
        	'cycle_bindable' => true,
        	'color' => 'fd9739',
        	'hierarchy' => 3,
        ]);

        Role::create([
        	'name' => 'User',
        	'color' => '000000',
        	'visible' => false,
        	'hierarchy' => 4,
        ]);
    }
}
