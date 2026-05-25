<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
        }

        table th {
            background: #eaeaea;
        }
    </style>
</head>

<body>

    <h2>LAPORAN PELAKSANAAN INDIKATOR MUTU</h2>

    <p>
        Periode :
        {{ $tanggalMulai->format('d M Y') }}
        -
        {{ $tanggalSelesai->format('d M Y') }}
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Standar</th>
                <th>No IKU</th>
                <th>Program Studi</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pelaksanaans as $pelaksanaan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelaksanaan->indikator->standar->nama }}</td>
                    <td>{{ $pelaksanaan->indikator->no_iku }}</td>
                    <td>{{ $pelaksanaan->prodi }}</td>
                    <td>{{ $pelaksanaan->keterangan }}</td>
                    <td>{{ $pelaksanaan->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
