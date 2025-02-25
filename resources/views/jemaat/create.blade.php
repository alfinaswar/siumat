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
        <div class="container-fluid">
            <div class="card card-bordered card-preview">
                <div class="card-header border-0 flex-wrap align-items-start">
                    <h5>Data Anggota Keluarga</h5>
                    <div>
                        <a href="{{ route('jemaat.index') }}" class="btn btn-primary btn-sm me-2">Kembali</a>
                        <a href="{{ route('jemaat.create') }}" class="btn btn-success btn-sm">Tambah Anggota Keluarga</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" data-export-title="Export">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status dalam Keluarga</th>
                                    <th>Status Perkawinan</th>
                                    <th width="280px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Keluarga as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                        <td>{{ $user->tanggal_lahir }}</td>
                                        <td>{{ $user->status_dalam_keluarga }}</td>
                                        <td>{{ $user->status_perkawinan }}</td>
                                        <td>
                                            <a href="{{ route('jemaat.tambah-dokumen', $user->id) }}"
                                                class="btn btn-info btn-sm" title="Detail">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('jemaat.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                                title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-delete').on('click', function() {
                let name = $(this).data('name');
                let url = $(this).data('url');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: `Data Jemaat "${name}" akan dihapus secara permanen!`,
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
