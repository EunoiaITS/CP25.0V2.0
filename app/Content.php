<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['type', 'title', 'trans_arabic', 'trans_eng', 'trans_malay',
    	'status', 'keys', 'details'];

	public function details() {
		return $this->hasMany('App\Content_detail');
	}
}
