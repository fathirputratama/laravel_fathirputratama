@extends('layouts.app')

@section('content')
    <h1 class="mb-3 mt-4">Data Rumah Sakit</h1>
    <a href="{{ route('rumah-sakit.create') }}" class="btn btn-primary mb-3">+ Tambah Rumah Sakit</a>

    <table class="table table-bordered table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Rumah Sakit</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rumahSakit as $r)
                <tr id="row-{{ $r->id }}">
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nama_rumah_sakit }}</td>
                    <td>{{ $r->alamat }}</td>
                    <td>{{ $r->email }}</td>
                    <td>{{ $r->telepon }}</td>
                    <td>
                        <a href="{{ route('rumah-sakit.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $r->id }}">Hapus</button>
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
                    text: "Data rumah sakit akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/rumah-sakit/' + id,
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
                                    text: 'Gagal menghapus data'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
