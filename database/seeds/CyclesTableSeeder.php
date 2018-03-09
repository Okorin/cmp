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
        [
            // Cycle 1
            [
            'mentor_signups_start_at'   => '2016-07-21',
            'mentor_signups_end_at'     => '2016-07-31',
            'mentee_signups_start_at'   => '2016-08-01',
            'mentee_signups_end_at'     => '2016-08-07',
            'starts_at'                 => '2016-08-08',
            'ends_at'                   => '2016-10-16',
            ],

            // Winter 2016
            [
            'mentor_signups_start_at'   => '2016-09-30',
            'mentor_signups_end_at'     => '2016-10-15',
            'mentee_signups_start_at'   => '2016-10-16',
            'mentee_signups_end_at'     => '2016-10-30',
            'starts_at'                 => '2016-10-30',
            'ends_at'                   => '2017-02-05',
            ],

            // Spring 2017
            [
            'mentor_signups_start_at'   => '2017-01-26',
            'mentor_signups_end_at'     => '2017-02-05',
            'mentee_signups_start_at'   => '2017-02-05',
            'mentee_signups_end_at'     => '2017-02-19',
            'starts_at'                 => '2017-02-19',
            'ends_at'                   => '2017-04-30',
            ],

            // Summer 2017
            [
            'mentor_signups_start_at'   => '2017-04-23',
            'mentor_signups_end_at'     => '2017-05-05',
            'mentee_signups_start_at'   => '2017-05-07',
            'mentee_signups_end_at'     => '2017-05-19',
            'starts_at'                 => '2017-05-21',
            'ends_at'                   => '2017-07-30',
            ],

            // Fall   2017
            [
            'mentor_signups_start_at'   => '2017-07-16',
            'mentor_signups_end_at'     => '2017-07-28',
            'mentee_signups_start_at'   => '2017-07-30',
            'mentee_signups_end_at'     => '2017-08-11',
            'starts_at'                 => '2017-08-13',
            'ends_at'                   => '2017-10-22',
            ],

            // Winter 2017
            [
            'mentor_signups_start_at'   => '2017-10-08',
            'mentor_signups_end_at'     => '2017-10-15',
            'mentee_signups_start_at'   => '2017-10-22',
            'mentee_signups_end_at'     => '2017-11-08',
            'starts_at'                 => '2017-11-13',
            'ends_at'                   => '2018-01-28',
            ],

            // Spring 2018
            [
            'mentor_signups_start_at'   => '2018-01-14',
            'mentor_signups_end_at'     => '2018-01-21',
            'mentee_signups_start_at'   => '2018-01-28',
            'mentee_signups_end_at'     => '2018-02-07',
            'starts_at'                 => '2018-02-11',
            'ends_at'                   => '2018-04-22',
            ],

            // Summer 2018
            [
            'mentor_signups_start_at'   => '2018-04-08',
            'mentor_signups_end_at'     => '2018-04-15',
            'mentee_signups_start_at'   => '2018-04-22',
            'mentee_signups_end_at'     => '2018-05-02',
            'starts_at'                 => '2018-05-06',
            'ends_at'                   => '2018-07-15',
            ],
        ];

        foreach ($cycles as $cycle) {
            Cycle::create($cycle);
        }
    }
}
