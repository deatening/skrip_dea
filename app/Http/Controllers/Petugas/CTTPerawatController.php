<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CttPerawat;
use App\User;

class CTTPerawatController extends Controller
{
    public function index($id){
        $no = 1;
        $user = User::where('role','2')->get();
        $pasien = User::find($id);
        $ctt = CttPerawat::where('id_user',$id)->get(); 
        return view('petugas.ctt_perawat.index',compact('user','no','ctt','pasien'));
    }

    public function store(Request $request){
        $simpan = CttPerawat::create($request->all());
        return redirect()->route('petugas.ctt_perawat',$request->id_user);
    }
}
