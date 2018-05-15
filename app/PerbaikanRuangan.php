<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerbaikanRuangan extends Model
{
    protected $table = 'perbaikan_ruangan';

    protected $fillable = [
    	'id',
    	'ruangan_id',
    	'tanggal_pengajuan',
    	'pengaju_id',
    	'alasan',
    	'perbaikan_status-id',
    	'tanggal_perbaikan',
    	'tanggal_selesai_perbaikan'
    ];
}

