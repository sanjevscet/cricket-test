<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['first_name', 'last_name', 'image_uri', 'jersey_number', 'country', 'team_id'];
}
