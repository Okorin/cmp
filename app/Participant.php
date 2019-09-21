<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //

    public function mentor() {
        return $this->belongsTo(User::class);
    }

    public function mentee() {
        return $this->belongsTo(User::class);
    }

    public function cycle() {
        return $this->belongsTo(Cycle::class);
    }

    public function gamemode($id) {
        return $this->belongsTo(Gamemode::class)->modeAsc($id);
    }

    public function scopeModeAsc($query, $mode) 
    {
        return $query->where('gamemode_id', '=', $mode)->orderBy('cycle_id', 'ASC');
    }
}
