<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerbaikanRuangan extends Model
{
    protected $table = 'perbaikan_ruangan';

    protected $fillable = [
    	'perbaikan_status_id',
    	'ruangan_id',
    	'pengaju_id'
    ];

    public function User(){
    	return $this->belongsTo('App\User','pengaju_id');
    }


    public function Ruangan(){
    	return $this->belongsTo('App\Ruangan','ruangan_id');
    	
    }
    public function PerbaikanStatus(){
    	return $this->belongsTo('App\PerbaikanStatus','perbaikan_status_id');
    	
    }

}
