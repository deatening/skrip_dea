@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Pasien
                        <div style="float: right">
                            <a href="{{ route('petugas.pasien.create') }}" class="btn btn-sm btn-primary">+</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm table-bordered" id="zero_config">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                @endphp
                                @foreach ($pengguna as $users)
                                    @php
                                        $ups = DB::table('ctt_perawat')
                                            ->where('id_user', $users->id_user)
                                            ->orderBy('created_at', 'DESC')
                                            ->first();
                                        $use = DB::table('users')
                                            ->where('id', $ups->id_user)
                                            ->first();
                                        if ($use != null) {
                                             $id_users = $use->name;
                                        } 
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $id_users }}</td>
                                        <td>{{ $users->Pasien->jk }}</td>
                                        <td>
                                            <a href="{{ route('petugas.ctt_perawat', $users->id_user) }}"
                                                class="btn btn-sm btn-info">Riwayat Rawat</a>
                                            <a href="{{ route('petugas.ctt_persalinan', $users->id_user) }}"
                                                class="btn btn-sm btn-primary">Riwayat Bidan</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($user as $item)
                                    @php
                                        $up = DB::table('ctt_perawat')
                                            ->where('id_user', $item->id)
                                            ->orderBy('created_at', 'DESC')
                                            ->first();
                                        if ($up != null) {
                                            $id_user = $up->id_user;
                                        }
                                    @endphp
                                    @if ($id_user != $item->id)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->jk }}</td>
                                            <td>
                                                <a href="{{ route('petugas.ctt_perawat', $item->id) }}"
                                                    class="btn btn-sm btn-info">Riwayat Rawat</a>
                                                <a href="{{ route('petugas.ctt_persalinan', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Riwayat Bidan</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
