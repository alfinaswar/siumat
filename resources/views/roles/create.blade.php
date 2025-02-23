 @extends('layouts.app')

 @section('content')
     <div class="row justify-content-center">
         <div class="col-lg-12 margin-tb">
             <div class="card">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <h2 class="my-0">Buat Peran Baru</h2>
                     <a class="btn btn-primary" href="{{ route('roles.index') }}">Kembali</a>
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

                     {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                     <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                             <div class="form-group">
                                 <strong>Nama Role / Hak Akses:</strong>
                                 {!! Form::text('name', null, ['placeholder' => 'Nama', 'class' => 'form-control']) !!}
                             </div>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                             <div class="form-group">
                                 <strong>Hak Akses:</strong>
                                 <br />
                                 <div class="form-check">
                                     @foreach ($permission as $value)
                                         <label class="form-check-label">
                                             {!! Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) !!}
                                             &nbsp;{{ $value->name }}
                                         </label>
                                         <br />
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                             <button type="submit" class="btn btn-primary">Buat</button>
                         </div>
                     </div>
                     {!! Form::close() !!}
                 </div>
             </div>
         </div>
     </div>

     <p class="text-center text-primary mt-3"><small>..</small></p>
 @endsection
