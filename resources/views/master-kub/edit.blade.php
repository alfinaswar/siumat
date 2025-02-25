@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="my-0">Edit Data KUB</h2>
                    <a class="btn btn-primary" href="{{ route('kub.index') }}">Kembali</a>
                </div>
                <div class="card-body">

                    {{-- Menampilkan Error Validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Edit Data KUB --}}
                    {!! Form::model($kub, ['route' => ['kub.update', $kub->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Nama KUB:</strong>
                                {!! Form::text('NamaKub', null, ['placeholder' => 'Nama KUB', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Deskripsi:</strong>
                                {!! Form::textarea('Deskripsi', null, ['placeholder' => 'Deskripsi', 'class' => 'form-control', 'rows' => 3]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
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
