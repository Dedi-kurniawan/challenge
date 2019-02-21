@extends('layouts.app') @section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card border-primary">
        <div class="card-header bg-primary border-success text-light">
          <h3>DATA SUPPLIER <a href="{{ route('supplier.create') }}">
            <button class="btn btn-md btn-warning float-right text-dark">Tambah Data</button> </a> </h3>
        </div>
        <div class="card-body">
          @include('suppliers._table') </div>
        <div class="card-footer border-primary">
          {{ $suppliers->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection @push('scripts') @include('layouts._flash') @endpush
