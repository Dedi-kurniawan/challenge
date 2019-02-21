@extends('layouts.app')
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card border-primary">
        <div class="card-header bg-primary border-primary text-light">
          <h3>DETAIL PRODUK </h3>
        </div>
        <div class="card-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-row">
              <div class="col-md-12 mb-3 {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="">Nama</label>
                {!! Form::text('nama', $products->nama, ['class' => 'form-control']) !!}
              </div>
              <div class="col-md-12 mb-3 {{ $errors->has('supplier_id') ? 'has-error' : '' }}">
                <label for="">Supplier</label>
                {!! Form::text('supplier_id',$products->supplier->nama, ['class' => 'form-control']) !!}
              </div>
              <div class="col-md-12 mb-3 {{ $errors->has('harga') ? 'has-error' : '' }}">
                <label for="">Harga Jual</label>
                {!! Form::text('harga', $products->harga, ['class' => 'form-control rupiah']) !!}
              </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
              <div class="form-check">
                {!! Form::checkbox('status', '1', isset($products->status) ? true : null, ['class' => 'form-check-input', 'id' => 'invalidCheck', 'required' => 'required']) !!}
                <label class="form-check-label" for="invalidCheck"> Aktif </label>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3 {{ $errors->has('image') ? 'has-error' : '' }}">
                <div class="image view view-first">
                  <img src="{{ $products->ImageProduct }}" style="max-width:250px;max-higth:250px;cursor:pointer;" class="img-thumb border" id="img" alt="...">
                </div>
                </div>
                <hr>
              </div>
              <hr>
              <a href="{{ route('produk.index') }}"><button type="button" class="btn btn-md btn-primary">Kembali</button></a>
            </div>
          </div>
        </div>
      </div>
      @endsection
