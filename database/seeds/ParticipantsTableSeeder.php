<?php

use Illuminate\Database\Seeder;
use App\Participant;
use App\Role;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participant = new Participant();
        $participant->cycle_id = 1;
        $participant->gamemode_id = 1;
        $participant->role_id = Role::ROLES['Mentor'];
        $participant->user_id = 1;
        $participant->save();
    }
}
