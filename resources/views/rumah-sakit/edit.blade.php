@extends('layouts.app')

@section('content')
    <h1 class="mb-3 mt-4">Edit Rumah Sakit</h1>

    <form action="{{ route('rumah-sakit.update', $rumahSakit->id) }}" method="POST" class="card p-4 shadow">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
            <input type="text" id="nama_rumah_sakit" name="nama_rumah_sakit" value="{{ $rumahSakit->nama_rumah_sakit }}"
                class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required>{{ $rumahSakit->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="{{ $rumahSakit->email }}" class="form-control"
                required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" id="telepon" name="telepon" value="{{ $rumahSakit->telepon }}" class="form-control"
                required>
        </div>
        <div class="d-grid gap-3">
            <button class="btn btn-success">Update</button>
            <a href="{{ route('rumah-sakit.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
