<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenteeCheckup extends Model
{
    protected $fillable = [
        'participant_id',
    ];

    protected $dates = [
        'filled_at',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class);
    }
}
