<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerHistory extends Model
{
    protected $fillable = ['matches', 'run', 'highest_score', 'fifties', 'hundreds', 'player_id'];
}
