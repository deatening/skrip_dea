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
                                    @if ($item->status == '1')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <?php $tgl = date('Y-m-d', strtotime($item->created_at)); ?>
                                                {{ tgl_indo($tgl) }}
                                            </td>
                                            <td>{{ $item->Pasien->name }}</td>
                                            <td>{{ $item->Perawat->name }}</td>
                                            <td>{{ $item->soap }}</td>
                                            <td>
                                                @if ($item->ver == '0')
                                                    Belum Dipilih
                                                @elseif ($item->ver == '1')
                                                    Rawat Inap
                                                @else
                                                    Rawat Jalan
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('petugas.ctt_perawat.show_lab', $item->id) }}"
                                                    target="_blank" class="btn btn-sm btn-success">Lab</a>
                                                <a href="{{ route('petugas.ctt_perawat.show', $item->id) }}"
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
