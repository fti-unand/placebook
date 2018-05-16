<?php

namespace App\Http\Controllers;

use App\PerbaikanRuangan;
use Illuminate\Http\Request;
use App\User;
use App\PerbaikanStatus;
use App\Ruangan;


use DB;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perbaikans = PerbaikanRuangan::all();
        $ruangan = Ruangan::pluck('nama', 'id');
        $status = PerbaikanStatus::pluck('nama','id');
        return view('admin.perbaikan.index', compact('perbaikans','ruangan','status','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perbaikans = PerbaikanRuangan::find($id);
        $ruangan = Ruangan::pluck('nama', 'id');
        $status = PerbaikanStatus::pluck('nama','id');
        $user = User::pluck('username','id');



        return view('admin.perbaikan.show', compact('perbaikans','ruangan','status','alasan','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perbaikan = PerbaikanRuangan::find($id);
        $status = PerbaikanStatus::all()->pluck('nama','id');
        // dd($perbaikan);
        return view('admin.perbaikan.edit', compact('perbaikan','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perbaikan = PerbaikanRuangan::find($id);
        $perbaikan->perbaikan_status_id=$request->perbaikan_status_id;
        $perbaikan->save();
        $perbaikans = PerbaikanRuangan::all();
        
        return redirect(route('perbaikan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerbaikanRuangan $perbaikanRuangan)
    {
        //
    }

    public function activate($id)
    {
        $perbaikan = PerbaikanRuangan::find($id);
        $perbaikan->perbaikan_status_id = 1;
        if ($perbaikan->save()) {
            toast()->success('Berhasil tidak menyetujui perbaikan ruangan '.$perbaikan->ruangan_id);
        } else {
            toast()->danger('Gagal menyetujui ');
        }
        return redirect()->route('perbaikan.index');
    }

    public function deactivate($id)
    {
         $perbaikan = PerbaikanRuangan::find($id);
         $perbaikan->perbaikan_status_id = 2;
        if ($perbaikan->save()) {
            toast()->success('Berhasil menyetujui ruangan' . $perbaikan->ruangan_id);
        } else {
            toast()->danger('Gagal menyetujui ruangan ' . $perbaikan->ruangan_id);
        }
        return redirect()->route('perbaikan.index');
    }
}
