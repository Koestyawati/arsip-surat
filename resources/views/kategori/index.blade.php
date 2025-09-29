@extends('layout')

@section('content')
<h2 class="mb-4">Kategori Surat</h2>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">Tambah</a>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nama Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kategoris as $k)
    <tr>
      <td>{{ $k->id }}</td>
      <td>{{ $k->nama_kategori }}</td>
      <td>
        <a href="{{ route('kategori.edit',$k) }}" class="btn btn-sm btn-info">Edit</a>
        <form action="{{ route('kategori.destroy',$k) }}" method="post" style="display:inline">
          @csrf @method('delete')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
