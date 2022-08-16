<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CttPerawat;
use App\Model\Rawat;
use App\User;
use Illuminate\Support\Facades\Auth;

class CTTPerawatController extends Controller
{
    public function index(){
        $no = 1;
        $ctt = CttPerawat::where('id_perawat',Auth::user()->id)->orderBy('created_at','DESC')->get();
        $user = User::where('role','3')->get();
        return view('perawat.ctt_perawat.index',compact('no','ctt','user'));
    }

    public function edit($id){
        $ctt = CttPerawat::find($id); 
        return view('perawat.ctt_perawat.edit',compact('ctt'));
    }

    public function update(Request $request,$id){
        $ctt = CttPerawat::find($id); 
        $ctt->soap = $request->soap;
        $ctt->ed = $request->ed;
        $ctt->save();
        return redirect()->route('perawat.ctt_perawat');
    }

    public function verifikasi(Request $request,$id){
        $ctt = CttPerawat::find($id); 
        $ctt->status = '1';
        $ctt->save();

        $rawat = new Rawat();
        $rawat->id_ctt = $ctt->id; 
        $rawat->id_user = $request->id_dokter; 
        $rawat->save();
        return redirect()->route('perawat.ctt_perawat');
    }
}
