<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class PerawatController extends Controller
{
    public function index()
    {
        $no = 1;
        $user = User::where('role', '2')->get();
        return view('petugas.perawat.index', compact('no', 'user'));
    }

    public function create(){
        return view('petugas.perawat.create');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);
        $user->jk = $request->jk;
        $user->role = '2';
        $user->save();
        return redirect('petugas/perawat');
    }
}
