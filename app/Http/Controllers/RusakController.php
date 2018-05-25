<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\File;
use App\PerbaikanRuangan;

class RusakController extends Controller
{
    public function index()
    {
        $rusaks = DB::SELECT(DB::raw("SELECT gedung.nama as gedung, ruangan.nama as ruangan, users.username, perbaikan_ruangan.tanggal_perbaikan, perbaikan_ruangan.tanggal_selesai_perbaikan, perbaikan_ruangan.alasan FROM perbaikan_ruangan JOIN ruangan on perbaikan_ruangan.ruangan_id=ruangan.id JOIN users on perbaikan_ruangan.pengaju_id=users.id JOIN gedung on ruangan.gedung_id=gedung.id"));
        return view('admin.rusaks.index', compact('rusaks'));
    }

}
