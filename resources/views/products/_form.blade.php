<div class="form-row">
  <div class="col-md-12 mb-3 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="validationCustom01">Nama</label>
    {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'validationCustom01', 'placeholder' => 'Nama', 'required' => 'required']) !!}
    <div class="invalid-feedback"> Nama Barang Di larang Kosong </div>
    {!! $errors->first('nama', '<p class="help-block text-danger"><b>:message</b></p>') !!}
  </div>
  <div class="col-md-12 mb-3 {{ $errors->has('supplier_id') ? 'has-error' : '' }}">
    <label for="validationCustom02">Supplier</label>
    {!! Form::select('supplier_id',$suppliers, null, ['class' => 'form-control select2','id' => 'validationCustom02', 'placeholder' => 'Pilih Supplier' ,'required' => 'required']) !!}
    <div class="invalid-feedback"> Pilih Supplier</div>
  </div>
  <div class="col-md-12 mb-3 {{ $errors->has('harga') ? 'has-error' : '' }}">
    <label for="validationCustom03">Harga Jual</label>
    {!! Form::text('harga', null, ['class' => 'form-control rupiah', 'id' => 'validationCustom03', 'placeholder' => 'Harga Jual', 'required' => 'required']) !!}
    <div class="invalid-feedback"> Harga Jual Di larang Kosong </div>
    {!! $errors->first('harga', '<p class="help-block text-danger"><b>:message</b></p>') !!}
  </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
  <div class="form-check">
    {!! Form::checkbox('status', '1', isset($products->status) ? true : null, ['class' => 'form-check-input', 'id' => 'invalidCheck', 'required' => 'required']) !!}
    <label class="form-check-label" for="invalidCheck"> Aktif </label>
    <div class="invalid-feedback">Silahkan Ceklis Status </div>
    {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
  </div>
</div>
<div class="form-row">
  <div class="col-md-12 mb-3 {{ $errors->has('image') ? 'has-error' : '' }}">
    <div class="image view view-first">
      <img src="{{ isset($products->ImageProduct) ? $products->ImageProduct : url('image/unggah.jpg') }}" style="max-width:250px;max-higth:250px;cursor:pointer;" class="img-thumb border" id="img" alt="...">
      <input type="file" name="image" id="image" class="{{ isset($products->image) ? 'image-edit image-thumb' : 'image-create image-thumb' }}" accept="image/*">
      <p class="text-danger" id="validation-max">Lebar & Tinggi Gambar Max 800x800</p>
      <p class="text-danger" id="validation-min">Lebar & Tinggi Gambar Min 300x250</p>
      <p class="text-danger" id="validation-kosong">Gambar Dilarang Kosong</p>
      {!! $errors->first('image', '<p class="help-block text-danger"><b>:message</b></p>') !!}
    </div>
  </div>
  <hr>
</div>
<hr>
{!! Form::submit(isset($products) ? 'Edit' : 'Simpan', ['class' => 'btn-md btn btn-primary ']) !!}
<a href="{{ route('produk.index') }}"><button type="button" class="btn btn-md btn-danger">Batal</button></a>
