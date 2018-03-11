<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Participant;

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

    $user->participants()->save(new Participant([
        'gamemode_id' => 1,
        'cycle_id' => 2,
        'role_id' => Role::ROLES['Mentor']
    ]));

    $user->participants()->save(new Participant([
        'gamemode_id' => 2,
        'cycle_id' => 1,
        'role_id' => Role::ROLES['Mentee'],
    ]));

    $user->participants()->save(new Participant([
        'gamemode_id' => 1,
        'cycle_id' => 3,
        'role_id' => Role::ROLES['Mentor'],
    ]));

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
