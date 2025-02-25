@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: '{{ $message }}',
            });
        </script>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($user, [
        'method' => 'PATCH',
        'route' => ['jemaat.update', $user->id],
        'class' => 'profile-form',
        'enctype' => 'multipart/form-data',
    ]) !!}

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card card-bx m-b30">
                <div class="card-header">
                    <h6 class="title">Edit Data Karyawan</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Data Pribadi -->
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Nama Lengkap</label>
                            {!! Form::text('name', null, ['placeholder' => 'Nama Lengkap', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Email</label>
                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">NIK</label>
                            {!! Form::text('nik', null, ['placeholder' => 'Nomor Induk Kependudukan', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">No. KK</label>
                            {!! Form::text('no_kk', null, ['placeholder' => 'Nomor Kartu Keluarga', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Nama Ayah</label>
                            {!! Form::text('nama_ayah', null, ['placeholder' => 'Nama Ayah', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Nama Ibu</label>
                            {!! Form::text('nama_ibu', null, ['placeholder' => 'Nama Ibu', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Jumlah Anggota Keluarga</label>
                            {!! Form::number('jumlah_anggota_keluarga', null, [
                                'placeholder' => 'Jumlah Anggota Keluarga',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Status Dalam keluarga</label>
                            {!! Form::select(
                                'status_dalam_keluarga',
                                [
                                    'AYAH' => 'AYAH',
                                    'IBU' => 'IBU',
                                    'ANAK' => 'ANAK',
                                    'LAINNYA' => 'LAINNYA',
                                ],
                                old('status_dalam_keluarga', $user->status_dalam_keluarga),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Baptis</label>
                            {!! Form::select(
                                'baptis',
                                [
                                    'Y' => 'YA',
                                    'N' => 'TIDAK',
                                ],
                                old('baptis', $user->baptis),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Tanggal Baptis</label>
                            {!! Form::date('tanggal_baptis', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Sidi</label>
                            {!! Form::select(
                                'sidi',
                                [
                                    'Y' => 'YA',
                                    'N' => 'TIDAK',
                                ],
                                old('sidi', $user->sidi),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Nomor Telepon</label>
                            {!! Form::text('nomor_telepon', null, ['placeholder' => 'Nomor Telepon', 'class' => 'form-control']) !!}
                        </div>

                        <!-- Data Kelahiran -->
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Tanggal Lahir</label>
                            {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Tempat Lahir</label>
                            {!! Form::text('tempat_lahir', null, ['placeholder' => 'Tempat Lahir', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Jenis Kelamin</label>
                            {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], null, [
                                'class' => 'form-control',
                                'placeholder' => '== Pilih Jenis Kelamin ==',
                            ]) !!}
                        </div>

                        <!-- Data Pribadi Lainnya -->
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Status Perkawinan</label>
                            {!! Form::select(
                                'status_perkawinan',
                                ['Belum Kawin' => 'Belum Kawin', 'Kawin' => 'Kawin', 'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati'],
                                null,
                                ['class' => 'form-control', 'placeholder' => '== Pilih Status Perkawinan =='],
                            ) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Tanggal Nikah</label>
                            {!! Form::date('tanggal_mikah', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Janda / Duda</label>
                            {!! Form::select(
                                'janda_duda',
                                [
                                    'Y' => 'YA',
                                    'N' => 'TIDAK',
                                ],
                                old('janda_duda', $user->janda_duda),
                                [
                                    'class' => 'form-control',
                                    'placeholder' => '== Pilih Status ==',
                                ],
                            ) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Yatim / Piatu</label>
                            {!! Form::select(
                                'yatim',
                                [
                                    'Y' => 'YA',
                                    'N' => 'TIDAK',
                                ],
                                old('yatim', $user->yatim),
                                [
                                    'class' => 'form-control',
                                    'placeholder' => '== Pilih Status ==',
                                ],
                            ) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Agama</label>
                            {!! Form::select(
                                'agama',
                                [
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Buddha' => 'Buddha',
                                    'Konghucu' => 'Konghucu',
                                ],
                                null,
                                ['class' => 'form-control', 'placeholder' => '== Pilih Agama =='],
                            ) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Suku</label>
                            {!! Form::text('suku', null, ['placeholder' => 'Suku', 'class' => 'form-control']) !!}
                        </div>

                        <!-- Data Wilayah -->
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Provinsi</label>
                            @php
                                $provinces = new App\Http\Controllers\DependantDropdownController();
                                $provinces = $provinces->provinces();
                            @endphp
                            <select class="form-control" name="provinsi" id="provinsi" required>
                                <option value="">== Pilih Provinsi ==</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $user->provinsi == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Kabupaten / Kota</label>
                            <select class="form-control" name="kota_kabupaten" id="kota" required>
                                <option value="{{ $user->kota_kabupaten ?? '' }}">{{ $user->getKabupaten->name ?? '' }}
                                </option>

                            </select>
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Kecamatan</label>
                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                                <option value="{{ $user->kecamatan ?? '' }}">{{ $user->getKecamatan->name ?? '' }}</option>
                            </select>
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Kelurahan / Desa</label>
                            <select class="form-control" name="kelurahan" id="desa" required>
                                <option value="{{ $user->kelurahan ?? '' }}">{{ $user->getKelurahan->name ?? '' }}</option>
                            </select>
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Alamat Lengkap</label>
                            {!! Form::textarea('alamat', null, ['placeholder' => 'Alamat', 'class' => 'form-control', 'rows' => 3]) !!}
                        </div>

                        <div class="col-sm-3 m-b30">
                            <label class="form-label">RT</label>
                            {!! Form::text('rt', null, ['placeholder' => 'RT', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-3 m-b30">
                            <label class="form-label">RW</label>
                            {!! Form::text('rw', null, ['placeholder' => 'RW', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Kode Pos</label>
                            {!! Form::text('kode_pos', null, ['placeholder' => 'Kode Pos', 'class' => 'form-control']) !!}
                        </div>

                        <!-- Data Pekerjaan dan Pendidikan -->
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Pendidikan Terakhir</label>
                            {!! Form::select(
                                'pendidikan_terakhir',
                                [
                                    'SD' => 'SD',
                                    'SMP' => 'SMP',
                                    'SMA' => 'SMA',
                                    'D3' => 'Diploma 3 (D3)',
                                    'S1' => 'Sarjana (S1)',
                                    'S2' => 'Magister (S2)',
                                    'S3' => 'Doktor (S3)',
                                ],
                                null,
                                ['class' => 'form-control', 'placeholder' => '== Pilih Pendidikan =='],
                            ) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Pekerjaan</label>
                            {!! Form::text('pekerjaan', null, ['placeholder' => 'Pekerjaan', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Penghasilan</label>
                            {!! Form::text('penghasilan', null, ['placeholder' => 'Contoh, 3000000', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Nama Instansi</label>
                            {!! Form::text('instansi', null, ['placeholder' => 'Nama Instansi', 'class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 m-b30">
                            <label class="form-label">KUB (Kelompok Umat Basis)</label>
                            <select class="me-sm-2 default-select form-control wide" name="kub">
                                <option value="">== Pilih KUB ==</option>
                                @foreach ($kub as $k)
                                    <option value="{{ $k->id }}" {{ $user->kub == $k->id ? 'selected' : '' }}>
                                        {{ $k->NamaKub }}
                                    </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Foto Profil</label>
                            @if ($user->foto_profil)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/foto_profil/' . $user->foto_profil) }}" alt="Profile"
                                        class="img-thumbnail" style="max-width: 200px">
                                </div>
                            @endif
                            <input type="file" name="foto_profil" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection




@push('scripts')
    <script>
        document.getElementById('profileImageInput').addEventListener('change', function(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#provinsi').on('change', function() {
                onChangeSelect('{{ route('cities') }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function() {
                onChangeSelect('{{ route('districts') }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
            })
        });
    </script>
@endpush
