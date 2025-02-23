@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end align-items-center mb-4 flex-wrap">
        <a href="{{ route('pendeta.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Tambah
            Pendeta</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pendeta</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="30%">Nama</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Gender</th>
                                    <th>Jabatan</th>
                                    <th>Tahun Masuk</th>
                                    <th>Pendidikan</th>
                                    <th>Foto</th>
                                    <th width="12%">Aksi</th>
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


    </div>
    </div>
    @if (session()->has('success'))
        <script>
            setTimeout(function() {
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
        $(document).ready(function() {
            $('body').on('click', '.btn-delete', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: `Data Pendeta akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('pendeta.destroy', ':id') }}'.replace(':id',
                                id),
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus',
                                    'Data Berhasil Dihapus',
                                    'success'
                                );

                                $('#example').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Failed!',
                                    'Error',
                                    'error'
                                );
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
            var dataTable = function() {
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
                    serverSide: true,
                    ajax: "{{ route('pendeta.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'kontak',
                            name: 'kontak'
                        },

                        {
                            data: 'tanggal_lahir',
                            name: 'tanggal_lahir'
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin'
                        },
                        {
                            data: 'jabatan',
                            name: 'jabatan'
                        },
                        {
                            data: 'tahun_masuk',
                            name: 'tahun_masuk'
                        },
                        {
                            data: 'pendidikan_terakhir',
                            name: 'pendidikan_terakhir'
                        },
                        {
                            data: 'foto',
                            name: 'foto'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            };
            dataTable();
        });
    </script>
@endsection
