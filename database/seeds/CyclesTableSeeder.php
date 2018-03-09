<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Cycle;

class CyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cycles =
        [[
            'starts_at' => '2016-01-16',
            'ends_at' => '2016-04-06',
            'mentor_signups_start_at' => '2016-01-07',
            'mentor_signups_end_at' => '2016-01-09',
            'mentee_signups_start_at' => '2016-01-10',
            'mentee_signups_end_at' => '2016-01-15',
        ]];
        foreach ($cycles as $cycle) {
            Cycle::create($cycle);
        }
    }
}
