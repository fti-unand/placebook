<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

        public function PeminjamanRuangan(){

    	return $this->hasMany('App\PeminjamanRuangan','peminjaman_status_id');
    	
    }

}
