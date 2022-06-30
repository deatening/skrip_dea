<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $no = 1;
        $user = User::where('role', '3')->get();
        return view('petugas.dokter.index', compact('no', 'user'));
    }

    public function create(){
        return view('petugas.dokter.create');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);
        $user->jk = $request->jk;
        $user->bidang = $request->bidang;
        $user->role = '3';
        $user->save();
        return redirect('petugas/dokter');
    }
}
