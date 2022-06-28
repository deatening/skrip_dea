<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CttPerawat;
use App\User;
use Illuminate\Support\Facades\Auth;

class CTTPerawatController extends Controller
{
    public function index(){
        $no = 1;
        $ctt = CttPerawat::where('id_perawat',Auth::user()->id)->get(); 
        return view('perawat.ctt_perawat.index',compact('no','ctt'));
    }

    public function edit($id){
        $ctt = CttPerawat::find($id); 
        return view('perawat.ctt_perawat.edit',compact('ctt'));
    }

    public function update(Request $request,$id){
        $ctt = CttPerawat::find($id); 
        $ctt->soap = $request->soap;
        $ctt->save();
        return redirect()->route('perawat.ctt_perawat');
    }
}
