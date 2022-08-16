@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Pasien
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php
                        function tgl_indo($tanggal)
                        {
                            $bulan = [
                                1 => 'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember',
                            ];
                            $pecahkan = explode('-', $tanggal);
                            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
                        }
                        ?>
                        <table class="table table-sm table-bordered" id="zero_config">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Perawat</th>
                                    <th>Soap</th>
                                    <th>Rawat Inap/Jalan</th>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($rawat as $item)
                                    @if ($jl =='2' && $item->rj=="Rawat Jalan")
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <?php $tgl = date('Y-m-d', strtotime($item->CTTPerawat->created_at)); ?>
                                                {{ tgl_indo($tgl) }}
                                            </td>
                                            <td>{{ $item->CTTPerawat->Pasien->name }}</td>
                                            <td>{{ $item->CTTPerawat->Perawat->name }}</td>
                                            <td>{{ $item->CTTPerawat->soap }}</td>
                                            <td>
                                                   {{$item->rj}}
                                            </td>
                                            <td>
                                                <a href="{{ route('petugas.ctt_perawat.show_lab', $item->CTTPerawat->id) }}"
                                                    target="_blank" class="btn btn-sm btn-success">Lab</a>
                                                <a href="{{ route('petugas.ctt_perawat.show', $item->CTTPerawat->id) }}"
                                                    class="btn btn-sm btn-info">Diagnosa</a>

                                            </td>
                                        </tr>
                                        @elseif ($jl =='1' && $item->rj=="Rawat Inap")
                                    <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <?php $tgl = date('Y-m-d', strtotime($item->CTTPerawat->created_at)); ?>
                                                {{ tgl_indo($tgl) }}
                                            </td>
                                            <td>{{ $item->CTTPerawat->Pasien->name }}</td>
                                            <td>{{ $item->CTTPerawat->Perawat->name }}</td>
                                            <td>{{ $item->CTTPerawat->soap }}</td>
                                            <td>
                                                   {{$item->rj}}
                                            </td>
                                            <td>
                                                <a href="{{ route('petugas.ctt_perawat.show_lab', $item->CTTPerawat->id) }}"
                                                    target="_blank" class="btn btn-sm btn-success">Lab</a>
                                                <a href="{{ route('petugas.ctt_perawat.show', $item->CTTPerawat->id) }}"
                                                    class="btn btn-sm btn-info">Diagnosa</a>

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
