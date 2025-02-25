@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end align-items-center mb-4 flex-wrap">
        <button type="button" class="btn btn-primary me-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambahKKModal">
            <i class="fas fa-plus me-2"></i>Tambah KK
        </button>
    </div>

    <!-- Modal Tambah KK -->
    <div class="modal fade" id="tambahKKModal" tabindex="-1" aria-labelledby="tambahKKModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKKModalLabel">Form Tambah Data Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-kk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Kode Rayon --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Pilih KUB</label>
                                <select name="kub" class="form-control @error('kub') is-invalid @enderror">
                                    <option value="">Pilih KUB</option>
                                    @foreach ($kub as $item)
                                        <option value="{{ $item->id }}" {{ old('kub') == $item->id ? 'selected' : '' }}>
                                            {{ $item->NamaKub }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Nomor KK --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nomor KK</label>
                                <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror"
                                    value="{{ old('no_kk') }}" placeholder="Nomor Kartu Keluarga" maxlength="16">
                                @error('no_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Nama KK --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama Kepala Keluarga</label>
                                <input type="text" name="nama_kk"
                                    class="form-control @error('nama_kk') is-invalid @enderror"
                                    value="{{ old('nama_kk') }}" placeholder="Nama Kepala Keluarga">
                                @error('nama_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                    value="{{ old('alamat') }}" placeholder="Alamat Lengkap">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Telepon --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror"
                                    value="{{ old('telepon') }}" placeholder="Nomor Telepon">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Bentuk Rumah --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Bentuk Rumah</label>
                                <select name="bentuk_rumah"
                                    class="form-control @error('bentuk_rumah') is-invalid @enderror">
                                    <option value="">Pilih Bentuk Rumah</option>
                                    <option value="Permanen" {{ old('bentuk_rumah') == 'Permanen' ? 'selected' : '' }}>
                                        Permanen</option>
                                    <option value="Tidak Permanen" {{ old('bentuk_rumah') == 'Tidak Permanen' ? 'selected' : '' }}>Tidak
                                        Permanen</option>

                                </select>
                                @error('bentuk_rumah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Status Rumah --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status Rumah</label>
                                <select name="status_rumah"
                                    class="form-control @error('status_rumah') is-invalid @enderror">
                                    <option value="">Pilih Status Rumah</option>
                                    <option value="Milik Sendiri" {{ old('status_rumah') == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri
                                    </option>
                                    <option value="Kontrak" {{ old('status_rumah') == 'Kontrak' ? 'selected' : '' }}>Kontrak
                                    </option>
                                </select>
                                @error('status_rumah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tombol Simpan --}}
                        <button type="submit" class="btn btn-md btn-primary btn-block">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Anggota Keluarga</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">KUB</th>
                                    <th width="15%">No KK</th>
                                    <th width="20%">Nama KK</th>
                                    <th width="15%">Alamat</th>
                                    <th width="10%">Telepon</th>
                                    <th width="10%">Bentuk Rumah</th>
                                    <th width="10%">Status Rumah</th>
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
                    text: `Data Kartu Keluarga akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('jemaat.destroy', ':id') }}'.replace(':id', id),
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
                    ajax: "{{ route('jemaat.index') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'no_kk', name: 'no_kk' },
                        { data: 'no_kk', name: 'no_kk' },
                        { data: 'nama_kk', name: 'nama_kk' },
                        { data: 'alamat', name: 'alamat' },
                        { data: 'telepon', name: 'telepon' },
                        { data: 'bentuk_rumah', name: 'bentuk_rumah' },
                        { data: 'status_rumah', name: 'status_rumah' },
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
