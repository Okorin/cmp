<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    //

    protected $dates = [
        'created_at',
        'updated_at',
        'starts_at',
        'ends_at',
        'mentor_signups_start_at',
        'mentor_signups_end_at',
        'mentee_signups_start_at',
        'mentee_signups_end_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'starts_at',
        'ends_at',
        'mentor_signups_start_at',
        'mentor_signups_end_at',
        'mentee_signups_start_at',
        'mentee_signups_end_at',
    ];
}
