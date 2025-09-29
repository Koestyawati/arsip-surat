@extends('layout')

@section('content')
<div class="row">

  <!-- Form Tambah Kategori -->
  <div class="col-md-9">
    <h3>{{ isset($kategori) ? 'Edit' : 'Tambah Kategori Surat' }}</h3>
    <p class="text-muted">Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol <b>"Simpan"</b></p>

    <form action="{{ isset($kategori) ? route('kategori.update',$kategori) : route('kategori.store') }}" method="post" class="card p-4">
      @csrf
      @if(isset($kategori)) @method('put') @endif

      <div class="mb-3">
        <label>ID (Auto Increment)</label>
        <input type="text" class="form-control"
                value="{{ $kategori->id ?? $nextId }}" readonly>
        </div>



      <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori ?? '' }}" required>
      </div>

      <div class="mb-3">
        <label>Judul</label>
        <textarea class="form-control" rows="3" placeholder="Kategori ini digunakan untuk surat yang sifatnya berupa pengumuman atau menginformasikan suatu perihal." disabled></textarea>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
