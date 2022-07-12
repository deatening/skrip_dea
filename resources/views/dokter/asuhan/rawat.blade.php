@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row r">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Rawat Inap</div>
                    <div class="card-body">
                        <a href="/dokter/rawat/1/jalan" class="btn btn-sm btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Rawat Jalan</div>
                    <div class="card-body">
                        <a href="/dokter/rawat/2/jalan" class="btn btn-sm btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
