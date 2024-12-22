<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Riwayat Suhu untuk Ruangan {{ $ruang->name }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Waktu</th>
                    <th scope="col">Suhu (°C)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $record)
                    <tr>
                        <td>{{ $record->created_at }}</td>
                        <td>{{ $record->temperature }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
