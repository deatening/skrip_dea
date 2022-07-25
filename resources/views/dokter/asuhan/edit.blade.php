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
                                <label for="">Rawat</label>
                                <select name="rj" id="">
                                    <option value="">Pilih Rawat</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">1. Riwayat Mensturasi</label>
                                <textarea name="riwayat_mensturasi" id="editor" cols="30" rows="5" class="form-control"
                                    placeholder="Riwayat Mensturasi : ">
                                    @if ($asuhan->riwayat_mensturasi != null)
{{ $asuhan->riwayat_mensturasi }}
@else
<p>Menarche :   </p> 
<p>Siklus   :   </p>
<p>Keluhan  :</p>
<p>HPHT     :</p>
<p>HPL      :</p>
<p>UK       :</p>
@endif
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">2. Riwayat Penyakit Dahulu</label>
                                <textarea name="penyakit_dahulu" id="editor" cols="30" rows="5" class="form-control"
                                    placeholder="Riwayat Penyakit Dahulu : ">
                                    @if ($asuhan->penyakit_terdahulu != null)
{{ $asuhan->penyakit_terdahulu }}
@else
<p>Penyakit :   </p> 
<p>Riwayat Operasi :   </p>
@endif
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">3. Riwayat Penyakit Keluarga</label>
                                <textarea name="penyakit_keluarga" id="editor" cols="30" rows="5" class="form-control"
                                    placeholder="Riwayat Penyakit Keluarga : ">{{ $asuhan->penyakit_keluarga }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">4. Riwayat Ginekeologi</label>
                                <textarea name="riwayat_ginekologi" id="editor" cols="30" rows="5" class="form-control"
                                    placeholder="Riwayat Ginekeologi : ">{{ $asuhan->riwayat_ginekeologi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">5. Diagnosa</label>
                                <input type="text" name="diagnosa" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-sm btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
