@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="my-0">Edit Data Keuangan</h2>
                    <a class="btn btn-primary" href="{{ route('pengeluaran.index') }}">Kembali</a>
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

                    {!! Form::model($pengeluaran, ['route' => ['pengeluaran.update', $pengeluaran->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Nama Pengeluaran:</strong>
                                {!! Form::text('NamaPengeluaran', null, ['placeholder' => 'Nama Pengeluaran', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Jumlah Pengeluaran:</strong>
                                {!! Form::number('JumlahPengeluaran', null, ['placeholder' => 'Jumlah Pengeluaran', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Tanggal Pengeluaran:</strong>
                                {!! Form::date('TanggalPengeluaran', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Keterangan:</strong>
                                {!! Form::textarea('Keterangan', null, ['placeholder' => 'Keterangan', 'class' => 'form-control', 'rows' => 3]) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>KUB:</strong>
                                <select name="Kub" class="form-control">
                                    <option value="">Pilih KUB</option>
                                    @foreach ($kub as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $pengeluaran->Kub ? 'selected' : '' }}>
                                            {{ $item->NamaKub }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-primary mt-3"><small>..</small></p>
@endsection
