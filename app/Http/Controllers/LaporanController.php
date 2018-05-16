<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class laporanController extends Controller
{
    public function index()
    {
        
        $laporans = DB::SELECT(DB::raw("SELECT gedung.nama as gedung, ruangan.nama as ruangan, users.username, peminjaman_ruangan.tanggal_peminjaman, peminjaman_ruangan.tanggal_selesai, peminjaman_ruangan.tujuan FROM peminjaman_ruangan JOIN ruangan on peminjaman_ruangan.ruangan_id=ruangan.id JOIN users on peminjaman_ruangan.peminjam_id=users.id JOIN gedung on ruangan.gedung_id=gedung.id"));
        return view('admin.laporans.index', compact('laporans'));
    }

   
}
