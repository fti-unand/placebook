<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanStatus extends Model
{
    protected $table = 'peminjaman_status';

    public function PeminjamanRuangan(){
    	return $this->hasMany('App\PeminjamanRuangan','peminjaman_status_id');
    }

    
}
