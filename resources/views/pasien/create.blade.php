@extends('layouts.app')

@section('content')
    <h1 class="mb-3 mt-4">Tambah Pasien</h1>

    <form action="{{ route('pasien.store') }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_telpon" class="form-label">No Telpon</label>
            <input type="text" id="no_telpon" name="no_telpon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
            <select id="rumah_sakit_id" name="rumah_sakit_id" class="form-control" required>
                @foreach ($rumahSakit as $r)
                    <option value="{{ $r->id }}">{{ $r->nama_rumah_sakit }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-3">
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
