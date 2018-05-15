v<?php

namespace App\Http\Controllers;

use App\PerbaikanRuangan;
use App\Ruangan;
use App\User;
use App\PerbaikanStatus;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Session;
use DB;

class PerbaikanRuanganController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->perbaikan_ruangans = PerbaikanRuangan::all();
        $this->ruangans=Ruangan::pluck('nama','id');
        $this->users=User::pluck('username','id');
        $this->status=PerbaikanStatus::pluck('nama','id');

     }

    public function index()
    {
        
        return view('perbaikan_ruangan.index')
                ->with('perbaikan_ruangans',$this->perbaikan_ruangans)
                ->with('ruangans', $this->ruangans)
                ->with('users',$this->users)
                ->with('status',$this->status);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('perbaikan_ruangan.create')
        ->with('perbaikan_ruangans',$this->perbaikan_ruangans)
                ->with('ruangans', $this->ruangans)
                ->with('users',$this->users)
                ->with('status',$this->status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'ruangan_id'=> 'required',
           'tanggal_pengajuan'=> 'required|date',
           'pengaju_id'=>'required',
           'alasan'=>'required',
           'perbaikan_status_id'=>'required',
           'status_pengajuan'=>'required',
           'tanggal_perbaikan'=> 'required|date',
            'tanggal_selesai_perbaikan'=> 'required|date',
            ]);

        $input = $request->all();
        $perbaikan = PerbaikanRuangan::create($input);
        
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Pengajuan perbaikan ruangan saved successfully."]);

        return redirect()->route('perbaikanruangans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perbaikanRuangan = $this->perbaikan_ruangans->find($id);

        if (empty($perbaikanRuangan)) {
            Flash::error('Korban Kecelakaan not found');

            return redirect(route('perbaikanruangans.index'));
        }

        return view('perbaikan_ruangan.show')
         ->with('perbaikanRuangan',$perbaikanRuangan)
                ->with('ruangans', $this->ruangans)
                ->with('users',$this->users)
                ->with('status',$this->status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perbaikanRuangan = $this->perbaikan_ruangans->find($id);

        if (empty($perbaikanRuangan)) {
            Flash::error('Pengajuan perbaikan not found');

            return redirect(route('perbaikanruangans.index'));
        }

        return view('perbaikan_ruangan.edit')
        ->with('perbaikanRuangan', $perbaikanRuangan)
         ->with('ruangans', $this->ruangans)
         ->with('users',$this->users)
         ->with('status',$this->status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'ruangan_id'=> 'required',
           'tanggal_pengajuan'=> 'required|date',
           'pengaju_id'=>'required',
           'alasan'=>'required',
           'perbaikan_status_id'=>'required',
           'status_pengajuan'=>'required',
           'tanggal_perbaikan'=> 'required|date',
            'tanggal_selesai_perbaikan'=> 'required|date',
            ]);

        $perbaikanRuangan = $this->perbaikan_ruangans->find($id);
        
        $perbaikanRuangan->ruangan_id = $request->input('ruangan_id');
        $perbaikanRuangan->tanggal_pengajuan = $request->input('tanggal_pengajuan');
        $perbaikanRuangan->pengaju_id = $request->input('pengaju_id');
        $perbaikanRuangan->alasan = $request->input('alasan');
        $perbaikanRuangan->perbaikan_status_id = $request->input('perbaikan_status_id'); 
        $perbaikanRuangan->status_pengajuan = $request->input('status_pengajuan'); 
        $perbaikanRuangan->tanggal_perbaikan = $request->input('tanggal_perbaikan');
        $perbaikanRuangan->tanggal_selesai_perbaikan = $request->input('tanggal_selesai_perbaikan');


        if ($perbaikanRuangan->save()) {
            toast()->success('Berhasil memperbaharui data pengajuan');
            
            return redirect()->route('perbaikanruangans.index');
        } else {
            toast()->error('Data Pengajuan tidak dapat diperbaharui');
            return redirect()->route('perbaikanruangans.edit', ['id' => $perbaikanRuangan->id]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PerbaikanRuangan  $perbaikanRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

        $perbaikanRuangan = $this->perbaikan_ruangans->find($id);
        $perbaikanRuangan->delete();
        

        return redirect()->route('perbaikanruangans.index');
    }

     public function activate($id)
    {
        $pengajuan = PerbaikanRuangan::find($id);
        $pengajuan->status_pengajuan = 1;
        if ($pengajuan->save()) {
            toast()->success('Berhasil mengaktifkan user '.$pengajuan->ruangan_id);
        } else {
            toast()->danger('Gagal mengaktifkan user '.$pengajuan->ruangan_id);
        }
        return redirect()->route('perbaikanruangans.index');
    }

    public function deactivate($id)
    {
        $pengajuan = $this->perbaikan_ruangans->find($id);

        $pengajuan->status_pengajuan = 0;
        if ($pengajuan->save()) {
            toast()->success('Berhasil Membatalkan Pengajuan ' . $pengajuan->ruangan_id);
        } else {
            toast()->danger('Gagal Membatalkan Pengajuan ' . $pengajuan->ruangan_id);
        }
        return redirect()->route('perbaikanruangans.index');
    }
}
