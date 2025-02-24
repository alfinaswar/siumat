@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end align-items-center mb-4 flex-wrap">
        <a href="{{ route('majelis.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Tambah
            Majelis</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Majelis</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">Kode</th>
                                    <th width="40%">Nama Majelis</th>
                                    <th width="15%">Gender</th>
                                    <th width="15%">Periode</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <script>
            setTimeout(function () {
                swal.fire({
                    title: "{{ __('Success!') }}",
                    text: "{!! \Session::get('success') !!}",
                    icon: "success",
                    type: "success"
                });
            }, 1000);
        </script>
    @endif
    <script>
        $(document).ready(function () {
            $('body').on('click', '.btn-delete', function () {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: `Data Majelis akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('majelis.destroy', ':id') }}'.replace(':id', id),
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                Swal.fire(
                                    'Dihapus',
                                    'Data Berhasil Dihapus',
                                    'success'
                                );
                                $('#example').DataTable().ajax.reload();
                            },
                            error: function (xhr) {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi Kesalahan',
                                    'error'
                                );
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });

            var dataTable = function () {
                var table = $('#example');
                table.DataTable({
                    responsive: true,
                    serverSide: true,
                    bDestroy: true,
                    processing: true,
                    language: {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Memuat...</span> ',
                        paginate: {
                            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                        }
                    },
                    ajax: "{{ route('majelis.index') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'get_rayon.nama_rayon', name: 'get_rayon.nama_rayon' },
                        { data: 'nama_majelis', name: 'nama_majelis' },
                        { data: 'gender', name: 'gender' },
                        { data: 'periode', name: 'periode' },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            };
            dataTable();
        });
    </script>
@endsection
