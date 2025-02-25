@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $message }}',
            });
        </script>
    @endif

    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content mb-3">
                <div class="text-end">
                    <a href="{{ route('ps.create') }}" class="btn btn-primary btn-sm">Tambah Pengurus</a>
                </div>
            </div>
        </div>

        <div class="card card-bordered card-preview">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" data-export-title="Export">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Gender</th>
                                <th>Periode</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Deskripsi</th>
                                <th width="280px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $profil)
                                <tr>
                                    <td width="5%">{{ $key + 1 }}</td>
                                    <td>{{ $profil->Nama }}</td>
                                    <td>{{ $profil->Jabatan }}</td>
                                    <td>{{ $profil->Gender }}</td>
                                    <td>{{ $profil->Periode }}</td>
                                    <td>{{ $profil->Alamat }}</td>
                                    <td>{{ $profil->NoTelp }}</td>
                                    <td>{{ $profil->Email }}</td>
                                    <td>{{ $profil->Deskripsi }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('ps.edit', $profil->id) }}">Edit</a>

                                        <button class="btn btn-danger btn-delete" data-id="{{ $profil->id }}"
                                            data-name="{{ $profil->Nama }}" data-url="{{ route('ps.destroy', $profil->id) }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete').on('click', function () {
                let name = $(this).data('name');
                let url = $(this).data('url');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: `Profil KUB "${name}" akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = $('#delete-form');
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
