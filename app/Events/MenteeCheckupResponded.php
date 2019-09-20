<?php

namespace App\Events;

use App\MenteeCheckup;
use Illuminate\Queue\SerializesModels;

class MenteeCheckupResponded
{
    use SerializesModels;

    public $menteeCheckup;

    /**
     * Create a new event instance.
     *
     * @param  MenteeCheckup  $menteeCheckup
     * @return void
     */
    public function __construct(MenteeCheckup $menteeCheckup)
    {
        $this->menteeCheckup = $menteeCheckup;
    }
}
