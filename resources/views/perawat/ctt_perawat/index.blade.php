@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Catatan Perawat</div>

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($ctt as $item)
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
                                            @if ($item->status == '0')
                                                <a href="{{ route('perawat.ctt_perawat.edit', $item->id) }}"
                                                    class="btn btn-sm btn-info">Buat Laporan</a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{$item->id}}">
                                                    Kirim Laporan
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{route('perawat.ctt_perawat.verifikasi',$item->id)}}" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Pasien</label>
                                                                       <input type="text" value="{{$item->Pasien->name}}" readonly class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Perawat</label>
                                                                       <input type="text" value="{{$item->Perawat->name}}" readonly class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Dokter/Bidan</label>
                                                                        <select name="id_dokter" id="" class="form-control">
                                                                            <option value="">Pilih Dokter/Bidan</option>
                                                                            @foreach ($user as $dok)
                                                                                <option value="{{$dok->id}}">{{$dok->name}} - {{$dok->bidang}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-success" value="Kirim">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
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
