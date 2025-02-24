@extends('layouts.app')

@section('content')
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Form Edit Data Pendeta</h4>
                            <button class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
                        </div>

                        <div class="card-body">
                            <div class="basic-form">
                                {{-- Form Edit Data Pendeta --}}
                                <form action="{{ route('pendeta.update', $pendeta->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') {{-- Method PUT untuk update data --}}

                                    <div class="row">

                                        {{-- Nama Pendeta --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Nama Pendeta</label>
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $pendeta->nama) }}" placeholder="Nama Pendeta">
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $pendeta->email) }}" placeholder="Email Pendeta">
                                            @error('email')
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
                                                value="{{ old('telepon', $pendeta->telepon) }}" placeholder="Nomor Telepon">
                                            @error('telepon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Alamat --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Pendeta">{{ old('alamat', $pendeta->alamat) }}</textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Tanggal Lahir --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                value="{{ old('tanggal_lahir', $pendeta->tanggal_lahir) }}">
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Jenis Kelamin --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="L"
                                                    {{ old('jenis_kelamin', $pendeta->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="P"
                                                    {{ old('jenis_kelamin', $pendeta->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Jabatan --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Jabatan</label>
                                            <input type="text" name="jabatan"
                                                class="form-control @error('jabatan') is-invalid @enderror"
                                                value="{{ old('jabatan', $pendeta->jabatan) }}" placeholder="Jabatan di Gereja">
                                            @error('jabatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Tahun Masuk --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Tahun Masuk</label>
                                            <select name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror">
                                                @for ($year = 2020; $year <= date('Y'); $year++)
                                                    <option value="{{ $year }}"
                                                        {{ old('tahun_masuk', $pendeta->tahun_masuk) == $year ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('tahun_masuk')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Pendidikan Terakhir --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Pendidikan Terakhir</label>
                                            <select name="pendidikan_terakhir"
                                                class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                                                @php
    $pendidikanOptions = [
        'SD',
        'SMP',
        'SMA',
        'D1',
        'D2',
        'D3',
        'D4',
        'S1',
        'S2',
        'S3',
    ];
                                                @endphp
                                                @foreach ($pendidikanOptions as $option)
                                                    <option value="{{ $option }}"
                                                        {{ old('pendidikan_terakhir', $pendeta->pendidikan_terakhir) == $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pendidikan_terakhir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Status Aktif --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Status</label>
                                            <select name="status_aktif"
                                                class="form-control @error('status_aktif') is-invalid @enderror">
                                                <option value="1"
                                                    {{ old('status_aktif', $pendeta->status_aktif) == '1' ? 'selected' : '' }}>Aktif
                                                </option>
                                                <option value="0"
                                                    {{ old('status_aktif', $pendeta->status_aktif) == '0' ? 'selected' : '' }}>Tidak
                                                    Aktif</option>
                                            </select>
                                            @error('status_aktif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Foto</label>



                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- Preview Gambar -->


                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewImage(this)"
                    accept="image/*">
                    @if($pendeta->foto)
                        <img src="{{ asset('storage/foto_pendeta/' . $pendeta->foto) }}" id="foto-preview" class="img-thumbnail mb-3"
                            style="max-width: 200px; display: block;">
                    @else
                        <img src="#" id="foto-preview" class="img-thumbnail mb-3" style="max-width: 200px; display: none;">
                    @endif
            </div>

            <script>
                function previewImage(input) {
                    const preview = document.getElementById('foto-preview');
                    const file = input.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }

                    if(file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = "#";
                        preview.style.display = 'none';
                    }
                }
            </script>
                                    </div>

                                    <button type="submit" class="btn btn-md btn-primary btn-block">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
