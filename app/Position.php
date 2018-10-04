<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Position extends Model
{

	public function employee() {

    	return $this->hasOne(Employee::class);

    }

    public function employees() {

    	return $this->hasMany(Employee::class);

    }

    public function empl() {

    	return $this->belongsTo('App\Employee');

    }


}
