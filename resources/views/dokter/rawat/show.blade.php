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
                    <div class="card-header">Catatan Perawat Detail</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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
                                        <td rowspan="2">No Kesehatan : {{ $rawat->CTTPerawat->Pasien->no_kesehatan }}
                                        </td>
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
                                        <label for="">Diagnosa:</label>
                                        <textarea name="diagnosa" id="" readonly cols="30" rows="5" class="form-control"
                                            placeholder="Diagnosa : ">{{ $rawat->diagnosa }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dokter:</label>
                                        <textarea name="" id="" cols="30" readonly rows="5" class="form-control" readonly
                                            placeholder="">Dokter yang Memeriksa : {{ $rawat->Dokter->name }} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status Rawat</label>
                                <input type="text" class="form-control" value="{{ $rawat->rj }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Anamnesa:</label>
                                <textarea name="anamnesa" id="" cols="30" readonly rows="7" class="form-control"
                                    placeholder="Anamnesa :">{{ $rawat->anamnesa }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Pemeriksaan Fisik:</label>
                                        <table class="table table-sm table-bordered" style="background-color: #F5F5F5">
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $rawat->pemeriksaan_fisik;
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanda-Tanda Vital:</label>
                                        <table class="table table-sm table-bordered" style="background-color: #F5F5F5">
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $rawat->ttd_vital
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Infus:</label>
                                        <textarea name="infus" id="" cols="30" rows="5" readonly class="form-control"
                                            placeholder="Infus : ">{{ $rawat->infus }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Injeksi:</label>
                                        <textarea name="injeksi" id="" cols="30" rows="5" readonly class="form-control"
                                            placeholder="Injeksi :">{{ $rawat->injeksi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-sm btn-success">
                                </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
