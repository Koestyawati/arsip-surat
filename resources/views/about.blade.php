@extends('layout')

@section('content')
<h2 class="mb-4">About</h2>

<div class="card p-3">
   <div class="d-flex align-items-center flex-row">
    <!-- Foto -->
  <img src="{{ asset('assets/tya.jpg') }}" width="150" class="me-4 rounded">

   <!-- Data -->
    <div class="flex-grow-1">
  <p><b>Nama:</b> KOESTYAWATI</p>
  <p><b>Prodi:</b> D3 Manajemen Informatika PSDKU Pamekasan</p>
  <p><b>NIM:</b> 2231750002</p>
  <p><b>Tanggal:</b> {{ date('27-09-2025') }}</p>
</div>
@endsection
