@extends('layouts.app')
@section('content')
<div class="container py-5">
  <h2>LIST PRODUK</h2>
  <hr>
  <div class="row justify-content-left">
    @foreach($katalog as $ka)
    <div class="col-md-4">
      <div class="card card-hover border-default shadow p-1 mb-3 bg-white rounded" style="width: 18rem;">
        <a href="{{ route('f.detail', $ka->id) }}">
          <img class="card-img-top" src="{{ $ka->ImageProduct }}" alt="Card image cap">
        </a>
          <div class="card-body">
            <h5 class="card-title text-center">{{ $ka->nama }}</h5>
            <h4 class="card-text text-center rupiah">{{ $ka->harga }}</h4>
          </div>
          <div class="card-footer bg-transparent border-dark text-center">Supplier : <a href="{{ route('f.supplier', $ka->supplier->id) }}">{{ $ka->supplier->nama }}</a></div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="col-md-7">
    <div class="float-right">
      {!! $katalog->links() !!}
    </div>
  </div>
</div>
@endsection
