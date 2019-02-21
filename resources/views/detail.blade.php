@extends('layouts.app')
@section('content')
<div class="container py-5">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{ $products->ImageProduct }}" /></div>
						</div>
					</div>
					<div class="details col-md-6">
                        <h3 class="product-title py-2">{{ $products->nama }}</h3>
                        <hr>
						<div class="rating">
							<span class="review-no">41 reviews</span>
						</div>
						<h4 class="price">harga: <span class="rupiah">{{ $products->harga  }}</span></h4>
                        <hr>
						<div class="action">
                            <a href="{{ route('f.supplier', $products->supplier->id) }}">
							<button class="add-to-cart btn btn-default" type="button">supplier : {{ $products->supplier->nama }}</button>
                            </a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection
