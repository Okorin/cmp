<?php

use Illuminate\Database\Seeder;
use App\Gamemode;

class GamemodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modes =
        [
            ['name' => 'osu!'],
            ['name' => 'osu!taiko'],
            ['name' => 'osu!catch'],
            ['name' => 'osu!mania'],
        ];

        foreach ($modes as $mode) 
        {
            Gamemode::create($mode);
        }
    }
}
