<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gedung;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gedungs=Gedung::all();

      return view('gedung.index',compact('gedungs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'luas' => 'required',
            'jumlah_lantai' => 'required',
            'tahun_pembangunan' => 'required'
        ]);

            $input=$request->all();
            $ged=Gedung::create($input);

            return redirect()->route('gedungs.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gedung = Gedung::find($id);
        return view('gedung.show',compact('gedung'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gedung = Gedung::find($id);

        return view('gedung.edit',compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'luas' => 'required',
            'jumlah_lantai' => 'required',
            'tahun_pembangunan' => 'required'
        ]);
        
        $gedung = Gedung::find($id);
        
        $gedung->nama=$request->input('nama');
        $gedung->lokasi=$request->input('lokasi');
        $gedung->luas=$request->input('luas');
        $gedung->jumlah_lantai=$request->input('jumlah_lantai');
        $gedung->tahun_pembangunan=$request->input('tahun_pembangunannama');



        if($gedung->save()){
            toast()->success('Berhasil memperbahari data');

            return redirect()->route('gedung.index');
        }
        else{
            toast()->error('gagal memperbahari data');

            return redirect()->route('gedung.edit',['id'=>$gedung->id]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gedung = Gedung::find($id);
        $gedung->delete();
        return redirect()->route('gedungs.index');

        $user->delete();
        toast()->success('Data user berhasil dihapus');

    }
}
