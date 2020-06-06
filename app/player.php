<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['first_name', 'last_name', 'image_uri', 'jersey_number', 'country', 'team_id'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function history()
    {
        return $this->hasOne('App\PlayerHistory');
    }
}
