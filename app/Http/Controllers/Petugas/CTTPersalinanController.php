<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Model\Asuhan;
use Illuminate\Http\Request;
use App\Model\CttPersalinan;
use App\User;

class CTTPersalinanController extends Controller
{
    public function index($id){
        $no = 1;
        $user = User ::where('role','2')->get();
        $pasien = User::find($id);
        $ctt = CttPersalinan::where('id_user',$id)->get();
        return view('petugas.ctt_persalinan.index',compact('user','no','ctt','pasien'));
    }
    public function store(Request $request){
        $simpan = CttPersalinan::create($request->all());
        return redirect()->route('petugas.ctt_persalinan',$request->id_user);
    }
    
    public function asuhan($id){
        $asuhan = Asuhan::where('id_ctt_p',$id)->first();
        return view('petugas.ctt_persalinan.asuhan',compact('asuhan'));
    }
    // public function show($id){
    //     $rawat = Asuhan::find($id);
    //     return view('petugas.ctt_persalinan.show',compact('rawat'));
    // }
}
