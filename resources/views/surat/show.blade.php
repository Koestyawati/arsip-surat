@extends('layout')

@section('content')
<div class="card p-4 shadow-sm">
  <h4 class="mb-3">Arsip Surat >> Lihat</h4>

  <div class="mb-3">
    <p><b>Nomor Surat:</b> {{ $surat->nomor }}</p>
    <p><b>Kategori:</b> {{ $surat->kategori->nama_kategori }}</p>
    <p><b>Judul:</b> {{ $surat->judul }}</p>
    <p><b>Tanggal Unggah:</b> {{ \Carbon\Carbon::parse($surat->tanggal)->translatedFormat('d F Y') }}</p>
  </div>

  {{-- Preview file PDF --}}
  <div class="mb-3" style="height:500px; border:1px solid #ccc; border-radius:6px; overflow:hidden;">
    @if($surat->file_pdf)
      <iframe src="{{ asset('storage/'.$surat->file_pdf) }}" 
              width="100%" height="100%" style="border:none;"></iframe>
    @else
      <div class="text-center text-muted p-5">📄 Tidak ada file PDF</div>
    @endif
  </div>

  {{-- Tombol Aksi --}}
  <div class="d-flex justify-content-between">
    <a href="{{ route('surat.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
    <div>
      @if($surat->file_pdf)
        <a href="{{ asset('storage/'.$surat->file_pdf) }}" class="btn btn-warning" download>Unduh</a>
      @endif
      <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary">Edit / Ganti File</a>
    </div>
  </div>
</div>
@endsection
