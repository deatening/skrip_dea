<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Model\CttPerawat;
use Illuminate\Http\Request;
use App\User;

class PaseienController extends Controller
{
    public function index(){
        $no = 1;
        // $pengguna = CttPerawat::orderBy('created_at','DESC')
        // ->distinct('created_at','DESC')
        // ->get(['id_user']);
        $user = CttPerawat::orderBy('updated_at','DESC')->get();
        $user->reverse();
        return view('petugas.pasien.index',compact('user','no'));
    }

    public function create(){
        return view('petugas.pasien.create');
    }

    public function store(Request $request){
        $simpan = User::create($request->all());
        
        return redirect('petugas/ctt_perawat/'.$simpan->id);
    }
}
