@extends('layout')

@section('content')
<div class="card p-4">
  <h4>Edit Surat</h4>

  <form action="{{ route('surat.update', $surat) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
      <label>Nomor Surat</label>
      <input type="text" name="nomor" value="{{ $surat->nomor }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" value="{{ $surat->judul }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori_id" class="form-control" required>
        @foreach($kategori as $k)
          <option value="{{ $k->id }}" {{ $surat->kategori_id == $k->id ? 'selected' : '' }}>
            {{ $k->nama_kategori }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" value="{{ $surat->tanggal }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>File PDF (kosongkan kalau tidak diganti)</label>
      <input type="file" name="file_pdf" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('surat.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
