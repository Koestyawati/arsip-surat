@extends('layout')

@section('content')
<h2 class="mb-4">Arsip Surat Desa Karangduren</h2>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form class="row mb-3">
  <div class="col-md-6">
    <input type="text" name="search" class="form-control" value="{{ $search ?? '' }}" placeholder="Cari surat...">
  </div>
  <div class="col-md-2">
    <button class="btn btn-primary">Cari</button>
  </div>
</form>

<div class="mb-3">
  <a href="{{ route('surat.create') }}" class="btn btn-success">Arsipkan Surat..</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>No Surat</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Tanggal</th>
      <th width="220">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($surats as $s)
    <tr>
      <td>{{ $s->nomor }}</td>
      <td>{{ $s->judul }}</td>
      <td>{{ $s->kategori->nama_kategori }}</td>
      <td>{{ $s->tanggal }}</td>
      <td>
        <a href="{{ route('surat.show',$s) }}" class="btn btn-sm btn-info">Lihat >></a>
        <a href="{{ route('surat.download',$s) }}" class="btn btn-sm btn-warning">Unduh</a>
        <form action="{{ route('surat.destroy',$s) }}" method="post" style="display:inline">
          @csrf @method('delete')
          <form action="{{ route('surat.destroy',$s) }}" method="post" style="display:inline">
  @csrf
  <form action="{{ route('surat.destroy',$s) }}" method="post" style="display:inline">
  @csrf
  @method('delete')
  <button type="submit" class="btn btn-sm btn-danger"
          onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?')">
    Hapus
  </button>
</form>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
