<div class="responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Kota</th>
        <th>Umur</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php $no = 1; @endphp
      @foreach($suppliers as $su)
      <tr>
        <td>{{ $no++ }}</td>
        <td><a href="{{ route('supplier.show', $su->id) }}">{{ $su->nama }}</a></td>
        <td>{{ $su->email }}</td>
        <td>{{ $su->kota }}</td>
        <td>{{ $su->UmurSupplier }} Tahun</td>
        <td>
          {!! Form::open(['route' => ['supplier.destroy', $su->id], 'method' =>'DELETE'])!!}
          <a title="Edit {{ $su->nama }}" href="{{ route ('supplier.edit', $su->id) }}" class="btn btn-primary btn-sm m-b-10 m-l-5">
            Edit
          </a>
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin Hapus Data {{ $su->nama }}')" title="Hapus">
            Hapus
          </button>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
