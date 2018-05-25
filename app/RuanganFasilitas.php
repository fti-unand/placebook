<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuanganFasilitas extends Model
{
    protected $table = 'ruangan_fasilitas';

    public function ruangan()
    {
    	return $this->belongsTo(Ruangan::class);

    }
    public function fasilitas()
    {
    	return $this->belongsTo(Fasilitas::class);
    }
}


