@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Catatan Persalinan
                        <div style="float: right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                +
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Perawat</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('petugas.ctt_persalinan.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Nama Pasien</label>
                                                    <select name="id_user" id="" readony class="form-control">
                                                        <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama Perawat</label>
                                                    <select name="id_perawat" id="" class="form-control">
                                                        <option value="">Pilih Perawat</option>
                                                        @foreach ($user as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                <input type="submit" class="btn btn-sm btn-success">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <th>HPHT</th>
                                    <th>Terapi</th>
                                    <th>Nama Bidan</th>
                                    <td>Action</td>
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
                                        <td>{{ $item->persalinan }}</td>
                                        <td>{{ $item->terapi }}</td>
                                        <td>{{ $item->penolong }}</td>
                                        <td>
                                            @if ($item->status == '0')
                                                -
                                            @else
                                                <a href="{{ route('petugas.ctt_persalinan.asuhan', $item->Asuhan->id_ctt_p) }}"
                                                    class="btn btn-sm btn-warning">Asuhan Kebidanan</a>
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
