@extends('layouts.app')
@section('content')
<div class="container py-5">
  <h2>LIST PRODUK</h2>
  <hr>
  <div class="row justify-content-left">
    @foreach($supplier as $ka)
    @foreach($ka->products as $pr)
    <div class="col-md-4 py-5">
      <div class="card card-hover border-default shadow p-1 mb-3 bg-white rounded" style="width: 18rem;">
        <a href="{{ route('f.detail', $pr->id) }}">
          <img class="card-img-top" src="{{ $pr->ImageProduct }}" alt="Card image cap">
        </a>
          <div class="card-body">
            <h5 class="card-title text-center">{{ $pr->nama }}</h5>
            <h4 class="card-text text-center rupiah">{{ $pr->harga }}</h4>
          </div>
          <div class="card-footer bg-transparent border-dark text-center">Supplier : <a href="#">{{ $ka->nama }}</a></div>
      </div>
    </div>
    @endforeach
    @endforeach
    {!! $supplier->links() !!}
  </div>
</div>
@endsection
