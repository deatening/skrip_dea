<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Model\Asuhan;
use App\Model\CttPersalinan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CTTPersalinanController extends Controller
{
    public function index(){
        $no = 1;
        $ctt = CttPersalinan::where('id_perawat',Auth::user()->id)->get();
        $user = User::where('role','3')->get();
        return view('perawat.ctt_persalinan.index',compact('no','ctt','user'));
    }

    public function edit($id){
        $ctt = CttPersalinan::find($id); 
        return view('perawat.ctt_persalinan.edit',compact('ctt'));
    }

    public function update(Request $request,$id){
        $ctt = CttPersalinan::find($id); 
        $ctt->persalinan = $request->persalinan;
        $ctt->terapi = $request->terapi;
        $ctt->penolong = $request->penolong;
        $ctt->save();
        return redirect()->route('perawat.ctt_persalinan');
    }

    public function verifikasi(Request $request,$id){
        $ctt = CttPersalinan::find($id); 
        $ctt->status = '1';
        $ctt->save();

        $rawat = new Asuhan();
        $rawat->id_ctt_p = $ctt->id; 
        $rawat->id_user = $request->id_dokter; 
        $rawat->save();
        return redirect()->route('perawat.ctt_persalinan');
    }
}
