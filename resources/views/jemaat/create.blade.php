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
            <div class="d-flex align-items-center mb-4">
                <h3 class="me-auto">Data Jemaat</h3>
                <div>
                    <a href="{{ route('jemaat.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 flex-wrap align-items-start">
                            <div class="col-md-8">
                                <div class="user d-sm-flex d-block pe-md-5 pe-0">
                                    <img src="{{ asset('storage/foto_profil/' . $user->foto_profil) }}" alt="Foto Profil"
                                        class="rounded-circle" style="width: 100px; height: 100px;">
                                    <div class="ms-sm-3 ms-0 me-md-5 md-0">
                                        <h5 class="mb-1 font-w600">{{ $user->name }}</h5>
                                        <div class="listline-wrapper mb-2">
                                            <span class="item"><i
                                                    class="text-primary far fa-envelope"></i>{{ $user->email }}</span>
                                            <span class="item"><i
                                                    class="text-primary fas fa-phone-alt"></i>{{ $user->nomor_telepon }}</span>
                                            <span class="item"><i
                                                    class="text-primary fas fa-map-marker-alt"></i>{{ $user->alamat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fs-20">Detail Data Jemaat</h4>
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">NIK:</span><span
                                            class="font-w400">{{ $user->nik }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">No KK:</span><span
                                            class="font-w400">{{ $user->no_kk }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nama Ayah:</span><span
                                            class="font-w400">{{ $user->nama_ayah }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nama Ibu:</span><span
                                            class="font-w400">{{ $user->nama_ibu }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Jumlah Anggota
                                            Keluarga:</span><span
                                            class="font-w400">{{ $user->jumlah_anggota_keluarga }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Status Dalam
                                            Keluarga:</span><span
                                            class="font-w400">{{ $user->status_dalam_keluarga }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Baptis:</span><span
                                            class="font-w400">{{ $user->baptis }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Tanggal
                                            Baptis:</span><span class="font-w400">{{ $user->tanggal_baptis }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Sidi:</span><span
                                            class="font-w400">{{ $user->sidi }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Janda/Duda:</span><span
                                            class="font-w400">{{ $user->janda_duda }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Yatim:</span><span
                                            class="font-w400">{{ $user->yatim }}</span></p>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Alamat:</span><span
                                            class="font-w400">{{ $user->alamat }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">RT/RW:</span><span
                                            class="font-w400">{{ $user->rt }}/{{ $user->rw }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kelurahan:</span><span
                                            class="font-w400">{{ $user->kelurahan }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kecamatan:</span><span
                                            class="font-w400">{{ $user->kecamatan }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span
                                            class="custom-label-2">Kota/Kabupaten:</span><span
                                            class="font-w400">{{ $user->kota_kabupaten }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Provinsi:</span><span
                                            class="font-w400">{{ $user->provinsi }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kode Pos:</span><span
                                            class="font-w400">{{ $user->kode_pos }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Tanggal Lahir:</span><span
                                            class="font-w400">{{ $user->tanggal_lahir }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Jenis Kelamin:</span><span
                                            class="font-w400">{{ $user->jenis_kelamin }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Tempat Lahir:</span><span
                                            class="font-w400">{{ $user->tempat_lahir }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex flex-wrap justify-content-between align-items-center">
                            <div class="col-md-6">
                                <p class="font-w600 mb-2">Status Perkawinan: {{ $user->status_perkawinan }}</p>
                                <p class="font-w600 mb-2">Tanggal Mikah: {{ $user->tanggal_mikah }}</p>
                                <p class="font-w600 mb-2">Agama: {{ $user->agama }}</p>
                                <p class="font-w600 mb-2">Suku: {{ $user->suku }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="font-w600 mb-2">Pekerjaan: {{ $user->pekerjaan }}</p>
                                <p class="font-w600 mb-2">Penghasilan: {{ $user->penghasilan }}</p>
                                <p class="font-w600 mb-2">Pendidikan Terakhir: {{ $user->pendidikan_terakhir }}</p>
                                <p class="font-w600 mb-2">Instansi: {{ $user->instansi }}</p>
                                <p class="font-w600 mb-2">KUB: {{ $user->kub }}</p>
                            </div>
                            <div class="col-12 text-end mt-3">
                                <a href="{{ route('jemaat.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Anggota Keluarga
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            <div class="container-fluid">
                <div class="card card-bordered card-preview">
                    <div class="card-header border-0 flex-wrap align-items-start">
                        Data Anggota Keluarga
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Status dalam Keluarga</th>
                                        <th>Status Perkawinan</th>
                                        <th width="280px">Action</th>
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
                                                <!-- Tombol Detail -->
                                                <a class="btn btn-primary"
                                                    href="{{ route('jemaat.tambah-dokumen', $user->id) }}" title="Detail">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <!-- Tombol Edit -->
                                                <a class="btn btn-primary" href="{{ route('jemaat.edit', $user->id) }}"
                                                    title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <!-- Tombol Delete -->
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                <button type="submit" class="btn btn-danger" title="Delete"
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
                </div><!-- .card-preview -->
            </div>
        </div>
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