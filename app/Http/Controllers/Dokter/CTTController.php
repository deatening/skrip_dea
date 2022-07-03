<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
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

    public function edit($id){
        $rawat = Rawat::find($id);
        return view('dokter.rawat.edit',compact('rawat'));
    }

    public function update(Request $request,$id){
        $rawat = Rawat::find($id);
        $rawat->diagnosa = $request->diagnosa;
        $rawat->anamnesa = $request->anamnesa;
        $rawat->pemeriksaan_fisik = $request->pemeriksaan_fisik;
        $rawat->infus = $request->infus;
        $rawat->injeksi = $request->injeksi;
        $rawat->ttd_vital = $request->ttd_vital;
        $rawat->save();
        return redirect('dokter/rawat');
    }
}
