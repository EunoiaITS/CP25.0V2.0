<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content_detail extends Model
{
    protected $fillable = ['content_id', 'key', 'value'];

    public function content() {
    	return $this->belongsTo('App\Content');
    }
}