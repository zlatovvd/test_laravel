<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	
    protected $fillable = ['fullname', 'position_id', 'datein', 'salary', 'img'];

	public function posit() {
		return $this->hasOne('App\Position', 'id', 'position_id');
	}
	
}
