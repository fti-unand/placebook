<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class chartController extends Controller
{
    public function highchart()
	{
	    $viewer = DB::table('peminjaman_ruangan')
	    	->SELECT(DB::raw("COUNT(peminjaman_ruangan.tanggal_peminjaman)"))
	    	->join(DB::raw("peminjaman_ruangan ON ruangan.id = peminjaman_ruangan.ruangan_id JOIN gedung on ruangan.gedung_id=gedung.id"))
	        ->groupBy(DB::raw("year(peminjaman_ruangan.tanggal_peminjaman)"))
	        ->get()->toArray();
	    $viewer = array_column($viewer, 'count');
	    
	    $click = Click::select(DB::raw("SUM(numberofclick) as count"))
	        ->orderBy("created_at")
	        ->groupBy(DB::raw("year(created_at)"))
	        ->get()->toArray();
	    $click = array_column($click, 'count');
	    return view('admin.statis.highchart')
	            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
	            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
	}
}
