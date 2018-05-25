<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';


    public function ruangfasilitas()
    {
    	return $this->hasMany(RuanganFasilitas::class);
    }
}
