@extends('layouts.app')

@section('content')
    <h1 class="mb-3 mt-4">Tambah Rumah Sakit</h1>

    <form action="{{ route('rumah-sakit.store') }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
            <input type="text" id="nama_rumah_sakit" name="nama_rumah_sakit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" id="telepon" name="telepon" class="form-control" required>
        </div>
        <div class="d-grid gap-3">
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('rumah-sakit.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
