@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="my-0">Edit Profil KUB</h2>
                    <a class="btn btn-primary" href="{{ route('pk.index') }}">Kembali</a>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('pk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Pilih KUB:</strong>
                                    <select name="idKub" class="form-control">
                                        <option value="">Pilih KUB</option>
                                        @foreach ($kub as $item)
                                            <option value="{{ $item->id }}" {{ $data->idKub == $item->id ? 'selected' : '' }}>
                                                {{ $item->NamaKub }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Stasi:</strong>
                                    <input type="text" class="form-control" name="idStasi" placeholder="Masukkan Stasi"
                                        value="{{ $data->idStasi }}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Nama:</strong>
                                    <input type="text" class="form-control" name="Nama" placeholder="Masukkan Nama"
                                        value="{{ $data->Nama }}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Jabatan:</strong>
                                    <select class="form-control" name="Jabatan" required>
                                        <option value="">Pilih Jabatan</option>
                                        <option value="Ketua" {{ $data->Jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                        <option value="Wakil Ketua" {{ $data->Jabatan == 'Wakil Ketua' ? 'selected' : '' }}>
                                            Wakil Ketua</option>
                                        <option value="Sekretaris" {{ $data->Jabatan == 'Sekretaris' ? 'selected' : '' }}>
                                            Sekretaris</option>
                                        <option value="Bendahara" {{ $data->Jabatan == 'Bendahara' ? 'selected' : '' }}>
                                            Bendahara</option>
                                        <option value="Anggota" {{ $data->Jabatan == 'Anggota' ? 'selected' : '' }}>Anggota
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    <select class="form-control" name="Gender" required>
                                        <option value="L" {{ $data->Gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ $data->Gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Periode:</strong>
                                    <input type="text" class="form-control" name="Periode" placeholder="Masukkan Periode"
                                        value="{{ $data->Periode }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong>Alamat:</strong>
                                <textarea class="form-control" name="Alamat" rows="3" placeholder="Masukkan Alamat"
                                    required>{{ $data->Alamat }}</textarea>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>No. Telp:</strong>
                                    <input type="text" class="form-control" name="NoTelp"
                                        placeholder="Masukkan Nomor Telepon" value="{{ $data->NoTelp }}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" class="form-control" name="Email" placeholder="Masukkan Email"
                                        value="{{ $data->Email }}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Deskripsi:</strong>
                                    <textarea class="form-control" name="Deskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi" required>{{ $data->Deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Foto Profil:</strong>
                                    <input type="file" class="form-control" name="FotoProfil">
                                    @if($data->FotoProfil)
                                        <img src="{{ asset('storage/foto_profil/' . $data->FotoProfil) }}" alt="Foto Profil"
                                            class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-primary mt-3"><small>..</small></p>
@endsection
