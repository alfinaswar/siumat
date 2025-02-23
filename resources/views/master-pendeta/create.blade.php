@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Form Tambah Data Pendeta</h4>
                <button class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    {{-- Form Create Data Pendeta --}}
                    <form action="{{ route('pendeta.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Nama Pendeta --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama Pendeta</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    placeholder="Nama Pendeta">
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
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Email Pendeta">
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
                                    class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}"
                                    placeholder="Nomor Telepon">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Pendeta">{{ old('alamat') }}</textarea>
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
                                    value="{{ old('tanggal_lahir') }}">
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
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                                    </option>
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
                                    value="{{ old('jabatan') }}" placeholder="Jabatan di Gereja">
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Tanggal Ordinasi --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tanggal Ordinasi</label>
                                <select name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror">
                                    @for ($year = 2020; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}"
                                            {{ old('tahun_masuk') == $year ? 'selected' : '' }}>
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
                                    <option value="">Pilih Pendidikan Terakhir</option>
                                    <option value="SD" {{ old('pendidikan_terakhir') == 'SD' ? 'selected' : '' }}>
                                        Sekolah Dasar</option>
                                    <option value="SMP" {{ old('pendidikan_terakhir') == 'SMP' ? 'selected' : '' }}>
                                        Sekolah Menengah Pertama (SMP)</option>
                                    <option value="SMA" {{ old('pendidikan_terakhir') == 'SMA' ? 'selected' : '' }}>
                                        Sekolah Menengah Atas (SMA / SMK)</option>
                                    <option value="D1" {{ old('pendidikan_terakhir') == 'D1' ? 'selected' : '' }}>
                                        Diploma (D1)</option>
                                    <option value="D2" {{ old('pendidikan_terakhir') == 'D2' ? 'selected' : '' }}>
                                        Diploma (D2)</option>
                                    <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>
                                        Diploma (D3)</option>
                                    <option value="D4" {{ old('pendidikan_terakhir') == 'D4' ? 'selected' : '' }}>
                                        Diploma (D4)</option>
                                    <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>
                                        Sarjana (S1)</option>
                                    <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>
                                        Magister (S2)</option>
                                    <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>
                                        Doktor (S3)</option>
                                </select>
                                @error('pendidikan_terakhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status_aktif"
                                    class="form-control @error('status_aktif') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ old('status_aktif') == '1' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="0" {{ old('status_aktif') == '0' ? 'selected' : '' }}>Tidak
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
                                <input type="file" name="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    value="{{ old('foto') }}">
                                @error('foto')
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
@endsection
