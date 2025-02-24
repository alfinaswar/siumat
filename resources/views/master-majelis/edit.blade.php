@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Form Edit Data Majelis</h4>
                <button class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('majelis.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- Kode Rayon --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kode Rayon</label>
                                <select name="kode_rayon" class="form-control @error('kode_rayon') is-invalid @enderror">
                                    <option value="">Pilih Rayon</option>
                                    @foreach ($rayon as $item)
                                        <option value="{{ $item->id }}" {{ $data->kode_rayon == $item->id ? 'selected' : (old('kode_rayon') == $item->id ? 'selected' : '') }}>
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

                            {{-- Nama Majelis --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama Majelis</label>
                                <input type="text" name="nama_majelis"
                                    class="form-control @error('nama_majelis') is-invalid @enderror"
                                    value="{{ old('nama_majelis', $data->nama_majelis) }}" placeholder="Nama Majelis">
                                @error('nama_majelis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Gender --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Pilih Gender</option>
                                    <option value="L" {{ $data->gender == 'L' ? 'selected' : (old('gender') == 'L' ? 'selected' : '') }}>Laki-laki</option>
                                    <option value="P" {{ $data->gender == 'P' ? 'selected' : (old('gender') == 'P' ? 'selected' : '') }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Periode --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Periode</label>
                                <input type="text" name="periode"
                                    class="form-control @error('periode') is-invalid @enderror"
                                    value="{{ old('periode', $data->periode) }}" placeholder="Contoh: 2023-2025">
                                @error('periode')
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
