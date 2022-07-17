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
                        <form action="{{ route('dokter.rawat.update', $rawat->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <table class="table table-sm table-bordered">
                                    <tr>
                                        <td rowspan="2">Nama Pasien : {{ $rawat->CTTPerawat->Pasien->name }}</td>
                                        <td>Tanggal Lahir : {{ $rawat->CTTPerawat->Pasien->tgl_lahir }}</td>
                                        <td rowspan="2">No KK: {{ $rawat->CTTPerawat->Pasien->no_kk }}</td>
                                        <td rowspan="2">Pekerjaan : {{ $rawat->CTTPerawat->Pasien->kerja }}</td>
    
                                    <tr>
                                        <td rowspan="2">No Kesehatan : {{ $rawat->CTTPerawat->Pasien->no_kesehatan }}</td>
                                    </tr>
                                    <td>Hubungan : {{ $rawat->CTTPerawat->Pasien->hubungan }}</td>
                                    <td>Jenis Kelamin : {{ $rawat->CTTPerawat->Pasien->jk }} </td>
                                    <td>Alamat : {{ $rawat->CTTPerawat->Pasien->alamat }}</td>
                                    </tr>
    
    
                                    <tr>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="diagnosa" id="" cols="30" rows="5" class="form-control" placeholder="Diagnosa : ">{{ $rawat->diagnosa }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="" id="" cols="30" rows="5" class="form-control" readonly placeholder="">Dokter yang Memeriksa : {{ $rawat->Dokter->name }} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status Rawat</label>
                                <select name="rj" id="" class="form-control">
                                    <option value="">Status Rawat</option>
                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="anamnesa" id="" cols="30" rows="7" class="form-control" placeholder="Anamnesa :">{{ $rawat->anamnesa }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Pemeriksaan Fisik:</label>
                                        <textarea name="pemeriksaan_fisik" id="editor" cols="30" rows="7" class="form-control" placeholder="">
                                            @if ($rawat->pemeriksaan_fisik != null)
{{ $rawat->pemeriksaan_fisik }}
@else
<p>Kepala/Leher : </p>
    <p>Thorax : </p>
   <p> Abdomen : </p>
   <p> Ekstremitas : </p>
@endif

                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanda-Tanda Vital:</label>
                                        <textarea name="ttd_vital" id="editor" cols="30" rows="7" class="form-control" placeholder="">
                                            @if ($rawat->ttd_vital != null)
{{ $rawat->ttd_vital }}
@else
<p>TD :</p> 
<p>Nadi :</p> 
<p>RR : </p>
<p>Suhu :</p>
@endif

                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="infus" id="" cols="30" rows="5" class="form-control" placeholder="Infus : ">{{ $rawat->infus }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="injeksi" id="" cols="30" rows="5" class="form-control" placeholder="Injeksi :">{{ $rawat->injeksi }}</textarea>
                                    </div>
                                </div>
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
