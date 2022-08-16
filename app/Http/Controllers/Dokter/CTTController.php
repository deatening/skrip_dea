<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Model\CttPerawat;
use App\Model\Rawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CTTController extends Controller
{
    public function index(){
        $no = 1;
        $rawat = Rawat::where('id_user',Auth::user()->id)->get();
        return view('dokter.rawat.index',compact('no','rawat'));
    }

    public function jalan($id){
        $no = 1;
        $jl =$id;
        $rawat = Rawat::all();
        return view('dokter.rawat.jalan',compact('no','rawat','jl'));
    }
    public function edit($id){
        $rawat = Rawat::find($id);
        return view('dokter.rawat.edit',compact('rawat'));
    }

    public function show($id){
        $rawat = Rawat::find($id);
        // $rawat = Rawat::where('id_ctt',$id)->first();
        return view('dokter.rawat.show',compact('rawat'));
    }

    public function show_lab($id){
        $rawat = Rawat::find($id);
        // $rawat = Rawat::where('id_ctt',$id)->first();
        return view('dokter.rawat.lab',compact('rawat'));
    }

    public function update(Request $request,$id){
        $rawat = Rawat::find($id);
        $rawat->diagnosa = $request->diagnosa;
        $rawat->anamnesa = $request->anamnesa;
        $rawat->pemeriksaan_fisik = $request->pemeriksaan_fisik;
        $rawat->infus = $request->infus;
        $rawat->injeksi = $request->injeksi;
        $rawat->ttd_vital = $request->ttd_vital;
        $rawat->rj = $request->rj;
        $rawat->status = '1';
        $rawat->save();
        return redirect('dokter/rawat');
    }

    public function lab(Request $request,$id){
        $rawat = Rawat::find($id);
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data/lab';
        $file->move($tujuan_upload, $nama_file);
        $rawat->lab = $nama_file;
        $rawat->ed = '1';
        $rawat->save();
        return redirect('dokter/rawat');
    }

    public function verifikasi(Request $request,$id){
        $rawat = Rawat::find($id);
        $rawat->status = '2'; 
        $rawat->save();
        return redirect('dokter/rawat');
    }
    public function jenis(){
        return view('dokter.rawat.rawat');
    }

  
   

}
