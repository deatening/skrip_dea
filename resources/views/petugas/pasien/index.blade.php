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
                                <?php
                            $kon = mysqli_connect('localhost', 'root', '', 'skripsi_dea');
                            $CTT = mysqli_query($kon, 'SELECT * FROM ctt_perawat GROUP BY id_user ORDER BY  created_at DESC ');
                            while ($ctt = mysqli_fetch_array($CTT)) {
                                $users = mysqli_query($kon, "SELECT * FROM users where id='$ctt[id_user]'");
                                while ($use = mysqli_fetch_array($users)) {
                                    if ($use['id'] == $ctt['id_user']) {
                            ?>

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $use['name'] }}</td>
                                    <td>{{ $use['jk'] }}</td>
                                    <td>
                                        <a href="{{ route('petugas.ctt_perawat',$use['id']) }}"
                                        class="btn btn-sm btn-info">Riwayat Rawat</a>
                                        <a href="{{ route('petugas.ctt_persalinan',$use['id']) }}"
                                        class="btn btn-sm btn-primary">Riwayat Bidan</a>
                                    </td>

                                    <?php

                                    }
                                    break;
                                }
                            }
                            ?>
                                </tr>
                            </tbody>
                        </table>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
