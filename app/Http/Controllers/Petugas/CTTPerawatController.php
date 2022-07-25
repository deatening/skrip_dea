<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CttPerawat;
use App\Model\Rawat;
use App\User;

class CTTPerawatController extends Controller
{
    public function index($id)
    {
        $no = 1;
        $user = User::where('role', '2')->get();
        $pasien = User::find($id);
        $ctt = CttPerawat::where('id_user', $id)->get();
        return view('petugas.ctt_perawat.index', compact('user', 'no', 'ctt', 'pasien'));
    }

    public function store(Request $request)
    {
        $simpan = CttPerawat::create($request->all());
        return redirect()->route('petugas.ctt_perawat', $request->id_user);
    }

    public function show($id)
    {
        $rawat = Rawat::where('id_ctt',$id)->first();
        // $rawat = Rawat::find($id);
        return view('petugas.ctt_perawat.show', compact('rawat'));
    }

    public function show_lab($id)
    {
        $rawat = Rawat::find($id);
        return view('petugas.ctt_perawat.lab', compact('rawat'));
    }

    public function verifikasi(Request $request, $id)
    {
        $CttPerawat = CttPerawat::find($id);
        $CttPerawat->ver = $request->ver;
        $CttPerawat->save();
        return redirect()->route('petugas.ctt_perawat', $CttPerawat->id_user);
    }

    public function laporan_cttP()
    {
        return view('petugas.ctt_perawat.lap_cttp');
    }

    public function store_laporan_cttP(Request $request)
    {
        $no = 1;
        $tgl = date('Y-m-d', strtotime($request->tgl));
        $ctt = CttPerawat::whereDate('created_at', $tgl)->get();
        return view('petugas.ctt_perawat.lap_cttp', compact('ctt', 'no','tgl'));
    }
}
