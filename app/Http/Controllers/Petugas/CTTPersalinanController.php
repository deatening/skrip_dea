<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CttPersalinan;

class CTTPersalinanController extends Controller
{
    public function index($id){
        $ctt = CttPersalinan::where('id_user',$id)->get();
        return view('petugas.ctt_persalinan.index');
    }
    public function store(Request $request){
        $simpan = CttPersalinan::create($request->all());
        return redirect()->route('petugas.ctt_persalinan',$request->id_user);
    }
    
    public function show($id){
        $rawat = Asuhan::find($id);
        return view('petugas.ctt_persalinan.show',compact('rawat'));
    }
}
