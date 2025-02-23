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
                    <form action="{{ route('rayon.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Method PUT untuk update data --}}

                        <div class="row">

                            {{-- Nama Pendeta --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama Rayon</label>
                                <input type="text" name="nama_rayon"
                                    class="form-control @error('nama_rayon') is-invalid @enderror"
                                    value="{{ old('nama_rayon', $data->nama_rayon) }}" placeholder="Nama Rayon">
                                @error('nama_rayon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-md btn-primary btn-block">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
