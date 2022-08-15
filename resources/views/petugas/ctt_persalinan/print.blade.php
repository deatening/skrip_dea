<link href="{{ asset('asset/dist/css/style.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/app.js') }}" defer></script>
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
<style>
    p {
        line-height: 1;
    }

    img {
        page-break-before: always;
    }

    td,
    th,
    input,
    textarea {
        font-size: 12px
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h4>Catatan Persalinan</h4>
            <table class="table table-sm table-bordered" id="zero_config">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Pasien</th>
                        <th>Nama Perawat</th>
                        <th>Anamnese</th>
                        <th>Terapi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php $tgl = date('Y-m-d', strtotime($ctt->created_at)); ?>
                            {{ tgl_indo($tgl) }}
                        </td>
                        <td>{{ $ctt->Pasien->name }}</td>
                        <td>{{ $ctt->Perawat->name }}</td>
                        <td>{{ $ctt->persalinan }}</td>
                        <td>{{ $ctt->terapi }}</td>
                    </tr>
                </tbody>
            </table>
            <div style="page-break-after:always;"> </div>
            <h4>Asuhan Kebidanan</h4>
            <form action="{{ route('dokter.asuhan.update', $asuhan->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td rowspan="2">Nama Pasien : {{ $asuhan->CTTPersalinan->Pasien->name }}</td>
                            <td>Tanggal Lahir : {{ $asuhan->CTTPersalinan->Pasien->tgl_lahir }}</td>
                            <!-- <td rowspan="2"> Lihat Juga Lain Catatan:</td> -->
                        </tr>

                        <tr>
                            <td>Jenis Kelamin : {{ $asuhan->CTTPersalinan->Pasien->jk }} </td>
                        </tr>
                        <tr>
                            <td colspan="3">Alamat : {{ $asuhan->CTTPersalinan->Pasien->alamat }}</td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="">Rawat </label>
                    <?= $asuhan->rj ?>
                </div>
                <div class="form-group">
                    <label for="">1. Riwayat Mensturasi</label>
                    <?= $asuhan->riwayat_mensturasi ?>
                </div>
                <div class="form-group">
                    <label for="">2. Riwayat Penyakit Dahulu</label>
                    <?= $asuhan->penyakit_terdahulu ?>
                </div>
                <div class="form-group">
                    <label for="">3. Riwayat Penyakit Keluarga</label>
                    <?= $asuhan->penyakit_keluarga ?>
                </div>
                <div class="form-group">
                    <label for="">4. Riwayat Ginekeologi</label>
                    <?= $asuhan->riwayat_ginekeologi ?>
                </div>
                <div class="form-group">
                    <label for="">5. Diagnosa</label>
                    <?= $asuhan->diagnosa ?>
                </div>
            </form>
        </div>
    </div>
</div>
