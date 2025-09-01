@extends('layouts.app')

@section('content')
        <h1 class="mb-3 mt-4">Dashboard</h1>

        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Rumah Sakit</h6>
                        <h2 class="fw-bold">{{ $jumlahRS }}</h2>
                        <a href="{{ route('rumah-sakit.index') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Pasien</h6>
                        <h2 class="fw-bold">{{ $jumlahPasien }}</h2>
                        <a href="{{ route('pasien.index') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
