@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Pencarian
                        <div style="float: right">

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('petugas.lap_ctt_per.store') }}" method="post">
                            @csrf
                            <table>
                                <tr>
                                    <td>
                                        <input type="date" value="" name="tgl" id=""
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="submit" class="btn btb-sm btn-primary" value="cari" name=""
                                            id="">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Catatan Persalinan
                        @if (isset($ctt))
                            {{ $tgl }}
                        @endif
                        <div style="float: right">

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
                                    <th>Anamnese</th>
                                    <th>Terapi</th>
                                    <!-- <th>Nama Bidan</th> -->
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($ctt))
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
                                            <!-- <td>{{ $item->penolong }}</td> -->
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
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
