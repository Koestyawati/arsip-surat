<!DOCTYPE html>
<html>
<head>
  <title>Arsip Surat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f4f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .sidebar {
      height: 100vh;
      background: linear-gradient(180deg, #0d6efd, #013a8c);
      color: white;
      padding-top: 20px;
      position: fixed;
      width: 240px;
      box-shadow: 2px 0 8px rgba(0,0,0,0.2);
    }
    .sidebar h4 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      letter-spacing: 1px;
    }
    .sidebar a {
      color: white;
      display: flex;
      align-items: center;
      padding: 12px 20px;
      text-decoration: none;
      font-size: 15px;
      border-radius: 8px;
      margin: 6px 12px;
      transition: all 0.3s ease;
    }
    .sidebar a i {
      margin-right: 10px;
      font-size: 18px;
    }
    .sidebar a:hover {
      background-color: rgba(255, 255, 255, 0.2);
      padding-left: 28px;
    }
    .content {
      margin-left: 260px;
      padding: 30px;
      min-height: 100vh;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
  </style>
  {{-- Font Awesome Icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>
  {{-- Sidebar kiri --}}
  <div class="sidebar">
    <h4>📁 Arsip Surat</h4>
    <a href="{{ route('surat.index') }}"><i class="fa-solid fa-inbox"></i> Arsip</a>
    <a href="{{ route('kategori.index') }}"><i class="fa-solid fa-folder-open"></i> Kategori Surat</a>
    <a href="{{ route('about') }}"><i class="fa-solid fa-circle-info"></i> About</a>
  </div>

  {{-- Konten utama --}}
  <div class="content">
    @yield('content')
  </div>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>