@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Tambah Pasien</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('petugas.pasien.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan</label>
                                <input type="text" name="kerja" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No. Kartu Keluarga</label>
                                <input type="text" name="no_kk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No. Kesehatan</label>
                                <input type="text" name="no_kesehatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Hubungan</label>
                                <select name="hubungan" id="" class="form-control">
                                    <option value="">Pilih Hubungan</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="stats" id="" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Suami">Menikah</option>
                                    <option value="Istri">Belum Menikah</option>
                                    <option value="Anak">Janda/Duda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
