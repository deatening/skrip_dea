@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Pasien</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('perawat.ctt_perawat.update', $ctt->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <td style="width: 150px">Nama Pasien</td>
                                        <td style="width: 10px">:</td>
                                        <td>{{$ctt->Pasien->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Perawat</td>
                                        <td>:</td>
                                        <td>{{$ctt->Perawat->name}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <textarea name="soap" id="" cols="30" rows="10" class="form-control" placeholder="Soap"></textarea>
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
