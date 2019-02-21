<div class="form-row">
  <div class="col-md-12 mb-3 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="validationCustom01">Nama</label>
    {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'validationCustom01', 'placeholder' => 'Nama', 'required' => 'required']) !!}
    <div class="invalid-feedback"> Nama Supplier Di larang Kosong </div>
    {!! $errors->first('nama', '<p class="help-block text-danger"><b>:message</b></p>') !!}
  </div>
  <div class="col-md-12 mb-3 {{ $errors->has('kota') ? 'has-error' : '' }}">
    <label for="kota">Kota Asal</label>
    {!! Form::select('kota',$kota, null, ['class' => 'form-control kota','id' => 'kota', 'placeholder' => 'Pilih Kota Asal' ,'required' => 'required']) !!}
    <div class="invalid-feedback"> Pilih Kota Asal</div>
  </div>
  <div class="col-md-12 mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="validationCustom03">Email</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'validationCustom03', 'placeholder' => 'Email', 'required' => 'required']) !!}
    <div class="invalid-feedback"> Email Di larang Kosong </div>
    {!! $errors->first('email', '<p class="help-block text-danger"><b>:message</b></p>') !!}
  </div>
  <div class="col-md-12 mb-3 {{ $errors->has('kota') ? 'has-error' : '' }}">
    <label for="tahun">Tahun</label>
    {!! Form::selectRange('tahun_kelahiran',1954,2019,null, ['class' => 'form-control tahun','id' => 'tahun', 'placeholder' => 'Pilih Supplier' ,'required' => 'required', 'style' => 'width:100%']) !!}
    <div class="invalid-feedback"> Pilih Tahun Kelahiran</div>
  </div>
</div>
</div>
<hr>
{!! Form::submit(isset($suppliers) ? 'Edit' : 'Simpan', ['class' => 'btn-md btn btn-primary ']) !!}
<a href="{{ route('supplier.index') }}"><button type="button" class="btn btn-md btn-danger">Batal</button></a>
