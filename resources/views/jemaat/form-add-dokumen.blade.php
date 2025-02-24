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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahDokumen">
                                    <i class="fas fa-plus"></i> Tambah Dokumen
                                </button>
                                <div class="card">
                                    <div class="card-header border-0 flex-wrap ">
                                        Data Dokumen Pribadi
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example"
                                                class="table table-striped table-bordered table-hover table-sm text-center"
                                                data-export-title="Export" style="width:100%">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th width="8%">No</th>
                                                        <th width="25%">Nama Dokumen</th>
                                                        <th width="42%">File</th>
                                                        <th width="25%" style="min-width: 120px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user->getDokumen as $key => $d)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $d->nama_dokumen }}</td>
                                                            <td>
                                                                <a class="btn btn-secondary"
                                                                    href="{{ asset('storage/file_dokumen/' . $d->file_dokumen) }}"
                                                                    download>
                                                                    <i class="fa-solid fa-download"></i> Download
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-danger btn-delete"
                                                                    data-url="{{ route('jemaat.hapus-dokumen', $d->id) }}">
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
                            </div>


                            <!-- Modal Tambah Dokumen -->
                            <div class="modal fade" id="modalTambahDokumen" tabindex="-1" role="dialog"
                                aria-labelledby="modalTambahDokumenLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTambahDokumenLabel">Tambah Dokumen Baru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('jemaat.simpan-dokumen', $user->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                                    <input type="text" class="form-control" id="nama_dokumen"
                                                        name="nama_dokumen"
                                                        placeholder="Contoh : KTP, Surat Nikah, Dan Lain Lain" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file_dokumen" class="form-label">File Dokumen</label>
                                                    <input type="file" class="form-control" id="file_dokumen"
                                                        name="file_dokumen" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                                        required>
                                                    <div class="form-text">Format file: PDF, DOC, JPG, PNG (Maks. 5MB)</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Dokumen</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (e) {
                e.preventDefault();
                var url = $(this).data('url');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush