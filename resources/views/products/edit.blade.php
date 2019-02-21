@extends('layouts.app')
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card border-primary">
        <div class="card-header bg-primary border-primary text-light">
          <h3>EDIT PRODUK </h3>
        </div>
        <div class="card-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
          {!! Form::model($products, ['route' => ['produk.update', $products->id], 'files' => true, 'method' => 'put', 'class' => 'needs-validation', 'novalidate']) !!}
            @include('products._form')
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@include('products._script')
@endsection
