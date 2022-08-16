@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Catatan Dokter</div>

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
                                    <th>Dokter</th>
                                    <th>Nama Pasien</th>
                                    <th>Lab</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($rawat as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <?php $tgl = date('Y-m-d', strtotime($item->created_at)); ?>
                                            {{ tgl_indo($tgl) }}
                                        </td>
                                        <td>{{ $item->Dokter->name }}</td>
                                        <td>{{ $item->CTTPerawat->Pasien->name }}</td>
                                        <td>
                                            <a href="{{ route('dokter.rawat.show_lab', $item->id) }}" target="_blank"
                                                class="btn btn-sm btn-success">Lab</a>
                                        </td>
                                        <td>
                                            @if ($item->status == '0')
                                                <a href="{{ route('dokter.rawat.update', $item->id) }}"
                                                    class="btn btn-sm btn-info">Diagnosa</a>
                                                <!-- Button trigger modal -->
                                            @elseif ($item->status == '1')
                                                <a href="{{ route('dokter.rawat.update', $item->id) }}"
                                                    class="btn btn-sm btn-info">Diagnosa</a>
                                                <!-- Button trigger modal -->

                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#exampleModala{{ $item->id }}">
                                                    Upload Lab
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModala{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Upload Lab
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('dokter.rawat.lab', $item->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <input type="file" name="file"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-success"
                                                                        value="Kirim">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($item->ed != '0')
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $item->id }}">
                                                    Kirim Laporan
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Verifikasi
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('dokter.rawat.verifikasi', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    Apakah Anda Yakin Ingin Mengirim Data
                                                                    {{ $item->CTTPerawat->Pasien->name }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-success"
                                                                        value="Kirim">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @else
                                                <a href="{{ route('dokter.rawat.show', $item->id) }}"
                                                    class="btn btn-sm btn-info">Diagnosa</a>
                                                <a href="#" class="btn btn-sm btn-success">Terkirim</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
