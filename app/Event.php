<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'address', 'description', 'date_from', 'date_till', 'image'];
}
