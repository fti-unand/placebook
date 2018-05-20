<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;

class fasilitasRuanganController extends Controller
{
    public function index(){
    	$fasilitas= Fasilitas::all();
    	return view('fasilitasRuangan.index', compact ('fasilitas'));
    }

    public function create(Request $req){
    	$input=$req->all();
    	Fasilitas::create($input);
    	return redirect(action('fasilitasRuanganController@index'));

    }

    public function edit($id,request $r){
    	$input = $r->all();
    	$fasili =Fasilitas::find($id);
    	 	$fasili->update($input);
    	return redirect(action('fasilitasRuanganController@index'));
    }

   

    public function destroy($id){
    	$fasilitas=Fasilitas::find($id);
    	$fasilitas->delete();
    	return redirect(action('fasilitasRuanganController@index'));
    }
}
