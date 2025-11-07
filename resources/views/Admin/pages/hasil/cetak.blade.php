<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Hasil Akhir - {{ $periodeAktif->nama_periode }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #eee;
        }
    </style>
</head>

<body>
    <h3 align="center">Hasil Akhir Perankingan - {{ $periodeAktif->nama_periode }}</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Alternatif</th>
                <th>Nilai</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $rank => $data)
                <tr>
                    <td>{{ $data->alternatif->nama ?? '-' }}</td>
                    <td>{{ number_format($data->nilai, 2) }}</td>
                    <td>{{ $rank + 1 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
