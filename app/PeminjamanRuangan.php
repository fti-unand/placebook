<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    protected $table = 'peminjaman_ruangan';

    public function PeminjamanStatus(){
    	return $this->belongsTo('App\PeminjamanStatus','peminjaman_status_id');
    }

      public function User(){
    	return $this->belongsTo('App\User','peminjam_id');
    }


        public function Ruangan(){
    	return $this->belongsTo('App\Ruangan','ruangan_id');
    }




    

}
