<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	 protected $primaryKey = 'id';

	 public function user() {
        return $this->hasOne('App\User', 'id', 'id');
    }
}
