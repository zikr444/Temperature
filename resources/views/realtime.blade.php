<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Real-Time Temperature Data</title>
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
  <!-- Navbar -->
  @include('partials.navbar')

  <!-- Konten Utama -->
  <div class="container mt-4">
    <h2>REAL TIME TEMPERATURE DATA</h2>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Ruang</span>
        <!-- Tombol untuk membuka Modal -->
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addRoomModal">
          <i class="fas fa-plus"></i> Tambah Ruangan
        </button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">Waktu</th>
              <th scope="col">Ruang</th>
              <th scope="col">Suhu</th>
              <th scope="col">Riwayat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="receivedTime">--:--:--</td>
              <td>Ruang Pengolahan</td>
              <td>
                <i class="fas fa-thermometer-half"></i>
                <span class="dht-labels">Temperature</span>
                <span id="temperature">0</span>
                <sup class="units">&deg;C</sup>
              </td>
              <td><a href="{{ url('/riwayat/ruangPengolahan') }}" class="btn btn-danger btn-sm">Lihat detail</a></td>
            </tr>
          </tbody>
        </table>
        <button id="monitorButton" class="btn btn-primary btn-lg" onclick="toggleTemperatureMonitoring()">Start Monitoring</button>
      </div>
    </div>
  </div>

  <!-- Modal untuk Tambah Ruangan -->
  <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRoomModalLabel">Tambah Ruangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="addRoomForm">
  <div class="mb-3">
    <label for="roomName" class="form-label">Nama Ruangan</label>
    <input type="text" class="form-control" id="roomName" name="nama_ruangan" required>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
  document.getElementById('addRoomForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const roomName = document.getElementById('roomName').value;

    // Kirim data ke server menggunakan fetch
    fetch('/ruangan/tambah', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ nama_ruangan: roomName })
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
      // Menambahkan baris baru untuk ruangan
      const tableBody = document.querySelector('table tbody');
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>--:--:--</td>
        <td>${data.ruang.name}</td>
        <td>
          <i class="fas fa-thermometer-half"></i>
          <span class="dht-labels">Temperature</span>
          <span id="temperature">0</span>
          <sup class="units">&deg;C</sup>
        </td>
        <td><a href="/riwayat/${data.ruang.id}" class="btn btn-danger btn-sm">Lihat detail</a></td>
      `;
      tableBody.appendChild(newRow);
    })
    .catch(error => console.error('Error:', error));
  });
</script>
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
