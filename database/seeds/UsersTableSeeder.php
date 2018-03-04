<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    $user = User::create([
        'name' => 'Okoyue',
    	'email' => 'okoyue@web.de',
    	'password' => bcrypt('secret'),
    ]);
    $user->roles()->attach(1);
    $user->roles()->attach(2);

    $user = User::create([
    	'name' => 'Okoratu',
    	'email' => 'okoratu@web.de',
    	'password' => bcrypt('secret'),
    ]);
    $user->roles()->attach(3);

    $user = User::create([
    	'name' => 'Okorin',
    	'email' => 'okorin@web.de',
    	'password' => bcrypt('secret'),
    ]);
    $user->roles()->attach(2);
    }
}
