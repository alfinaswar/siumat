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
        <div class="card card-bordered card-preview mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('pengeluaran.export') }}" method="GET" class="form-inline">
                            <div class="form-group mb-2">
                                <label for="start_date" class="mr-2">Tanggal Awal:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="end_date" class="mr-2">Tanggal Akhir:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">
                                <i class="fas fa-file-excel"></i> Export Excel
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary btn-sm">Tambah Pengeluaran</a>
                    </div>
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
                                <th>Nama Pengeluaran</th>
                                <th>Jumlah Pengeluaran</th>
                                <th>Tanggal Pengeluaran</th>
                                <th>Keterangan</th>
                                <th>KUB</th>
                                <th width="280px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $keuangan)
                                <tr>
                                    <td width="5%">{{ $key + 1 }}</td>
                                    <td>{{ $keuangan->NamaPengeluaran }}</td>
                                    <td>{{ $keuangan->JumlahPengeluaran }}</td>
                                    <td>{{ $keuangan->TanggalPengeluaran }}</td>
                                    <td>{{ $keuangan->Keterangan }}</td>
                                    <td>{{ $keuangan->getKub->NamaKub }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-delete" data-id="{{ $keuangan->id }}"
                                            data-name="{{ $keuangan->NamaPengeluaran }}"
                                            data-url="{{ route('pengeluaran.destroy', $keuangan->id) }}">
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
                    text: `Data pengeluaran "${name}" akan dihapus secara permanen!`,
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
