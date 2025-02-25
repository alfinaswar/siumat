@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="my-0">Tambah Profil KUB</h2>
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

                    <form action="{{ route('pk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Pilih KUB:</strong>
                                    <select name="idKub" class="form-control">
                                        <option value="">Pilih KUB</option>
                                        @foreach ($kub as $item)
                                            <option value="{{ $item->id }}">{{ $item->NamaKub }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Stasi:</strong>
                                    <input type="text" class="form-control" name="idStasi" placeholder="Masukkan Stasi"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Nama:</strong>
                                    <input type="text" class="form-control" name="Nama" placeholder="Masukkan Nama"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Jabatan:</strong>
                                    <select class="form-control" name="Jabatan" required>
                                        <option value="">Pilih Jabatan</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="Wakil Ketua">Wakil Ketua</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    <select class="form-control" name="Gender" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Periode:</strong>
                                    <input type="text" class="form-control" name="Periode" placeholder="Masukkan Periode"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Alamat:</strong>
                                    <textarea class="form-control" name="Alamat" rows="3" placeholder="Masukkan Alamat"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>No. Telp:</strong>
                                    <input type="text" class="form-control" name="NoTelp"
                                        placeholder="Masukkan Nomor Telepon" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" class="form-control" name="Email" placeholder="Masukkan Email"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Deskripsi:</strong>
                                    <textarea class="form-control" name="Deskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <strong>Foto Profil:</strong>
                                    <input type="file" class="form-control" name="FotoProfil">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-primary mt-3"><small>..</small></p>
@endsection
