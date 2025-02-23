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
                    <a href="{{ route('kub.create') }}" class="btn btn-primary btn-sm">Tambah Data KUB</a>
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
                                <th>Nama KUB</th>
                                <th width="280px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td width="5%">{{ $key + 1 }}</td>
                                    <td>{{ $user->NamaKub }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('kub.edit', $user->id) }}">Edit</a>

                                        <!-- Simpan URL dari route() ke atribut data -->
                                        <button class="btn btn-danger btn-delete" data-id="{{ $user->id }}"
                                            data-name="{{ $user->NamaKub }}"
                                            data-url="{{ route('kub.destroy', $user->id) }}">
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
        $(document).ready(function() {
            $('.btn-delete').on('click', function() {
                let name = $(this).data('name');
                let url = $(this).data('url');


                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: `Data KUB "${name}" akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = $('#delete-form');
                        form.attr('action', url); // Set action form menggunakan URL dari route()
                        form.submit(); // Submit form
                    }
                });
            });
        });
    </script>
@endpush
