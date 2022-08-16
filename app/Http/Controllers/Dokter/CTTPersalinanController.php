<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Model\Asuhan;
use App\Model\CttPersalinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CTTPersalinanController extends Controller
{
    public function index(){
        $no = 1;
        $asuhan = Asuhan::where('id_user',Auth::user()->id)->get();
        return view('dokter.asuhan.index',compact('no','asuhan'));
    }

    // public function jalan($id){
    //     $no = 1;
    //     $asuhan = CttPersalinan::where('ver',$id)->get();
    //     return view('dokter.asuhan.jalan',compact('no','asuhan'));
    // }
    public function edit($id){
        $asuhan = asuhan::find($id);
        return view('dokter.asuhan.edit',compact('asuhan'));
    }

    public function show($id){
        $asuhan = asuhan::find($id);
        return view('dokter.asuhan.show',compact('asuhan'));
    }

    public function show_lab($id){
        $asuhan = asuhan::find($id);
        return view('dokter.asuhan.lab',compact('asuhan'));
    }

    public function update(Request $request,$id){
        $asuhan = asuhan::find($id);
        $asuhan->riwayat_mensturasi = $request->riwayat_mensturasi;
        $asuhan->penyakit_terdahulu = $request->penyakit_dahulu;
        $asuhan->penyakit_keluarga = $request->penyakit_keluarga;
        $asuhan->riwayat_ginekeologi = $request->riwayat_ginekologi;
        $asuhan->diagnosa = $request->diagnosa;
        $asuhan->rj = $request->rj;
        $asuhan->ed ='1';
        $asuhan->status = '1';
        $asuhan->save();
        return redirect('dokter/asuhan');
    }

    public function verifikasi(Request $request,$id){
        $asuhan = asuhan::find($id);
        $asuhan->status = '2'; 
        $asuhan->save();
        return redirect('dokter/asuhan');
    }

    // public function lab(Request $request,$id){
    //     $asuhan = asuhan::find($id);
    //     $file = $request->file('file');
    //     $nama_file = time() . "_" . $file->getClientOriginalName();
    //     $tujuan_upload = 'data/lab';
    //     $file->move($tujuan_upload, $nama_file);
    //     $asuhan->lab = $nama_file;
    //     $asuhan->save();
    //     return redirect('dokter/asuhan');
    // }
}
