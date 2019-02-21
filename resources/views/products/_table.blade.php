<div class="responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Supplier</th>
        <th>Status</th>
        <th>Harga Jual</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php $no = 1; @endphp
      @foreach($products as $pr)
      <tr>
        <td>{{ $no++ }}</td>
        <td><a href="{{ route('produk.show', $pr->id) }}">{{ $pr->nama }}</a></td>
        <td><img src="{{ $pr->ImageProduct }}" class="img-responsive" style="width: 50px" alt="image"> </td>
        <td>{{ $pr->supplier->nama }}</td>
        <td>{!! $pr->status !!}</td>
        <td class="rupiah">{{ $pr->harga }}</td>
        <td>
          {!! Form::open(['route' => ['produk.destroy', $pr->id], 'method' =>'DELETE'])!!}
          <a title="Edit {{ $pr->nama }}" href="{{ route ('produk.edit', $pr->id) }}" class="btn btn-primary btn-sm m-b-10 m-l-5">
            Edit
          </a>
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin Hapus Data {{ $pr->nama }}')" title="Hapus">
            Hapus
          </button>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
