@extends('layouts.app')
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card border-primary">
        <div class="card-header bg-primary border-success text-light">
          <h3>DATA DETAIL SUPPLIER </h3>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="col-md-12 mb-3 {{ $errors->has('nama') ? 'has-error' : '' }}">
              <label for="Nama">Nama</label>
              {!! Form::text('nama', $suppliers->nama, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-12 mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
              <label for="Email">Email</label>
              {!! Form::email('email', $suppliers->email, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-12 mb-3 {{ $errors->has('kota') ? 'has-error' : '' }}">
              <label for="Kota">Kota Asal</label>
              {!! Form::text('kota', $suppliers->kota, ['class' => 'form-control kota']) !!}
            </div>
            <div class="col-md-12 mb-3 {{ $errors->has('kota') ? 'has-error' : '' }}">
              <label for="Tahun">Tahun</label>
              {!! Form::text('tahun_kelahiran',$suppliers->tahun_kelahiran, ['class' => 'form-control']) !!}
            </div>
          </div>
          <hr>
        </div>
        <div class="card-footer border-primary">
          <a href="{{ route('supplier.index') }}">
            <button type="submit" class="btn btn-md float-right btn-primary">Kembali</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
