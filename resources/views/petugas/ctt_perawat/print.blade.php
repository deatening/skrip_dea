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
    td,th,input,textarea{
        font-size: 12px
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h4>Catatan Perawat</h4>
            <table class="table table-sm table-bordered">
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Nama Perawat</th>
                    <th>Soap</th>
                </tr>
                <tr>
                    <td>
                        <?php $tgl = date('Y-m-d', strtotime($ctt->created_at)); ?>
                        {{ tgl_indo($tgl) }}
                    </td>
                    <td>{{ $ctt->Pasien->name }}</td>
                    <td>{{ $ctt->Perawat->name }}</td>
                    <td>{{ $ctt->soap }}</td>
                </tr>
            </table>
            <div style="page-break-after:always;"> </div>
            <h4>Diagnosa</h4>
            <table class="table table-sm table-bordered">
                <tr>
                    <td rowspan="2">Nama Pasien : {{ $rawat->CTTPerawat->Pasien->name }}</td>
                    <td>Tanggal Lahir : {{ $rawat->CTTPerawat->Pasien->tgl_lahir }}</td>
                    <td rowspan="2">No KK: {{ $rawat->CTTPerawat->Pasien->no_kk }}</td>
                    <td rowspan="2">Pekerjaan : {{ $rawat->CTTPerawat->Pasien->kerja }}</td>

                <tr>
                    <td rowspan="2">No Kesehatan : {{ $rawat->CTTPerawat->Pasien->no_kesehatan }}
                    </td>
                </tr>
                <tr>
                    <td>Hubungan : {{ $rawat->CTTPerawat->Pasien->hubungan }}</td>
                    <td>Jenis Kelamin : {{ $rawat->CTTPerawat->Pasien->jk }} </td>
                    <td>Alamat : {{ $rawat->CTTPerawat->Pasien->alamat }}</td>
                </tr>
            </table>
            <table class="table table-sm table-borderless">
                <tr>
                    <td>
                        Diagnosa :
                        <textarea name="diagnosa" id="" readonly cols="30" rows="5" class="form-control"
                            placeholder="Diagnosa : ">{{ $rawat->diagnosa }}</textarea>
                    </td>
                    <td>
                        Dokter :
                        <textarea name="" id="" cols="30" readonly rows="5" class="form-control" readonly
                            placeholder="">Dokter yang Memeriksa : {{ $rawat->Dokter->name }} </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Status Rawat :
                        <input type="text" class="form-control" value="{{ $rawat->rj }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="">Anamnesa:</label>
                        <textarea name="anamnesa" id="" cols="30" readonly rows="7" class="form-control"
                            placeholder="Anamnesa :">{{ $rawat->anamnesa }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Pemeriksaan Fisik:</label>
                        <?php
                        echo $rawat->pemeriksaan_fisik;
                        ?>
                    </td>
                    <td>
                        <label for="">Tanda-Tanda Vital:</label>
                        <?php
                        echo $rawat->ttd_vital;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Infus:</label>
                        <textarea name="infus" id="" cols="30" rows="5" readonly class="form-control"
                            placeholder="Infus : ">{{ $rawat->infus }}</textarea>
                    </td>
                    <td>
                        <label for="">Injeksi:</label>
                        <textarea name="injeksi" id="" cols="30" rows="5" readonly class="form-control"
                            placeholder="Injeksi :">{{ $rawat->injeksi }}</textarea>
                    </td>
                </tr>
            </table>
            <div style="page-break-after:always;"> </div>
            <img src="{{ asset('data/lab') }}/{{ $rawat->lab }}" style="width: 100%;page-break-after:always;" alt="">
        </div>
    </div>
</div>
<script>
    window.print()
</script>
