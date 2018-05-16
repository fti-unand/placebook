<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

public function PerbaikanRuangan(){
    	return $this->hasMany('App\PerbaikanRuangan','ruangan_id');
    }
    
}
