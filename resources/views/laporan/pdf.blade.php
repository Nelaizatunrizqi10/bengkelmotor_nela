<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .kop-bengkel {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-bengkel h1 {
            margin: 0;
        }
        .kop-bengkel p {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="kop-bengkel">
        <h1>NEGATAMI MOTOR</h1>
        <p>Jalan. Tegal raya, Kota Tegal, Jawa Tengah</p>
        <p>+62 889 - 098 - 5419</p>
    </div>

    <h3>Laporan Akuntansi</h3>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Rekening</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembukuan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->servis->tanggal_selesai ?? '-' }}</td>
                    <td>{{ $item->servis->profile->user->name ?? '-' }}</td>
                    <td>{{ $item->akun->nama ?? '-' }}</td>
                    <td>{{ $item->saldo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
