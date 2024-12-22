<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Riwayat Ruang Pengolahan</title>
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  @include('partials.navbar')

  <div class="container mt-4">
    <h2>Riwayat Ruang Pengolahan</h2>
    <div class="card">
      <div class="card-header">Riwayat Suhu</div>
      <div class="card-body">
        <p>Ini adalah halaman untuk melihat riwayat suhu ruang pengolahan.</p>
        <!-- Di sini kamu bisa menambahkan data riwayat sesuai kebutuhan -->
      </div>
    </div>
  </div>

  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
