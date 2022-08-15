@extends('layouts.app')

@section('content')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
        });
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Pasien</div>

                    <div class="card-body">
                        <form action="{{ route('dokter.asuhan.update', $asuhan->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <table class="table table-sm table-bordered">
                                    <tr>
                                        <td rowspan="2">Nama Pasien : {{ $asuhan->CTTPersalinan->Pasien->name }}</td>
                                        <td>Tanggal Lahir : {{ $asuhan->CTTPersalinan->Pasien->tgl_lahir }}</td>
                                        <td rowspan="2"> Lihat Juga Lain Catatan:</td>
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
                                <label for="">1. Riwayat Mensturasi</label>
                                <?= $asuhan->riwayat_mensturasi?>
                            </div>
                            <div class="form-group">
                                <label for="">2. Riwayat Penyakit Dahulu</label>
                                <?= $asuhan->penyakit_terdahulu?>
                            </div>
                            <div class="form-group">
                                <label for="">3. Riwayat Penyakit Keluarga</label>
                                <?= $asuhan->penyakit_keluarga?>
                            </div>
                            <div class="form-group">
                                <label for="">4. Riwayat Ginekeologi</label>
                                <?= $asuhan->riwayat_ginekeologi?>
                            </div>
                            <div class="form-group">
                                <label for="">5. Diagnosa</label>
                                <?= $asuhan->diagnosa?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
