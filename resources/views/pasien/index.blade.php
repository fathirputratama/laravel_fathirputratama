@extends('layouts.app')

@section('content')
    <h1 class="mb-3 mt-4">Data Pasien</h1>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">+ Tambah Pasien</a>

    <div class="mb-3">
        <label>Filter berdasarkan Rumah Sakit</label>
        <select id="filterRS" class="form-select w-50">
            <option value="">Semua Rumah Sakit</option>
            @foreach (\App\Models\RumahSakit::all() as $r)
                <option value="{{ $r->id }}">{{ $r->nama_rumah_sakit }}</option>
            @endforeach
        </select>
    </div>

    <table class="table table-bordered table-hover" id="pasienTable">
        <thead class="table-secondary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Rumah Sakit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $p)
                <tr id="row-{{ $p->id }}">
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama_pasien }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_telpon }}</td>
                    <td>{{ $p->rumahSakit->nama_rumah_sakit }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $p->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data pasien ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/pasien/' + id,
                        type: 'DELETE',
                        success: function(res) {
                            if (res.success) {
                                $('#row-' + id).remove();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: res.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Gagal menghapus data pasien'
                            });
                        }
                    });
                }
            });
        });

            $('#filterRS').change(function() {
                var selectedRsId = $(this).val();
                if (selectedRsId) {
                    $.get('/pasien/filter/' + selectedRsId, function(data) {
                        var rows = '';
                        data.forEach(function(p) {
                            rows += `
                    <tr id="row-${p.id}">
                        <td>${p.id}</td>
                        <td>${p.nama_pasien}</td>
                        <td>${p.alamat}</td>
                        <td>${p.no_telpon}</td>
                        <td>${p.rumah_sakit.nama_rumah_sakit}</td>
                        <td>
                            <a href="/pasien/${p.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="${p.id}">Hapus</button>
                        </td>
                    </tr>`;
                        });
                        $('#pasienTable tbody').html(rows);
                    });
                } else {
                    location.reload();
                }
            });
        });
    </script>
@endpush
