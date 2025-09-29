@extends('layout')

@section('content')
<h2 class="mb-4">Tambah Arsip Surat</h2>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data" class="card p-3">
  @csrf
  <div class="mb-3">
    <label>Nomor Surat</label>
    <input type="text" name="nomor" class="form-control">
  </div>
  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control">
  </div>
  <div class="mb-3">
    <label>Kategori</label>
    <select name="kategori_id" class="form-select">
      @foreach($kategoris as $k)
        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>File (PDF)</label>
    <input type="file" name="file_pdf" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
