@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Form Tambah Data Rayon</h4>
                <button class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    {{-- Form Create Data Pendeta --}}
                    <form action="{{ route('rayon.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Nama Pendeta --}}
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Nama Rayon</label>
                                <input type="text" name="nama_rayon"
                                    class="form-control @error('nama_rayon') is-invalid @enderror"
                                    value="{{ old('nama_rayon') }}" placeholder="Nama Rayon">
                                @error('nama_rayon')
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
