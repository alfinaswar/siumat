@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Form Edit Data Kartu Keluarga</h4>
                <button class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('data-kk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- Kode Rayon --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kode Rayon</label>
                                <select name="kode_rayon" class="form-control @error('kode_rayon') is-invalid @enderror">
                                    <option value="">Pilih Rayon</option>
                                    @foreach ($rayon as $item)
                                        <option value="{{ $item->id }}" {{ ($data->kode_rayon == $item->id || old('kode_rayon') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->nama_rayon }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kode_rayon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Nomor KK --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nomor KK</label>
                                <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror"
                                    value="{{ old('no_kk', $data->no_kk) }}" placeholder="Nomor Kartu Keluarga"
                                    maxlength="16">
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
                                    value="{{ old('nama_kk', $data->nama_kk) }}" placeholder="Nama Kepala Keluarga">
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
                                    value="{{ old('alamat', $data->alamat) }}" placeholder="Alamat Lengkap">
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
                                    value="{{ old('telepon', $data->telepon) }}" placeholder="Nomor Telepon">
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
                                    <option value="Permanen" {{ ($data->bentuk_rumah == 'Permanen' || old('bentuk_rumah') == 'Permanen') ? 'selected' : '' }}>
                                        Permanen</option>
                                    <option value="Tidak Permanen" {{ ($data->bentuk_rumah == 'Tidak Permanen' || old('bentuk_rumah') == 'Tidak Permanen') ? 'selected' : '' }}>Tidak Permanen</option>
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
                                    <option value="Milik Sendiri" {{ ($data->status_rumah == 'Milik Sendiri' || old('status_rumah') == 'Milik Sendiri') ? 'selected' : '' }}>Milik Sendiri</option>
                                    <option value="Kontrak" {{ ($data->status_rumah == 'Kontrak' || old('status_rumah') == 'Kontrak') ? 'selected' : '' }}>Kontrak</option>
                                </select>
                                @error('status_rumah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tombol Update --}}
                        <button type="submit" class="btn btn-md btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
