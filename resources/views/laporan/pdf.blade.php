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
    <p>Periode : {{ $tanggalMulai->format('d M Y') }} - {{ $tanggalSelesai->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Standar Mutu</th>
                <th>Pernyataan Standar</th>
                <th>Indikator Standar</th>
                <th>Tanggal</th>
                <th>Unit</th>
                <th>Uraian Pelaksanaan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pelaksanaan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>({{ $item->indikator->standar->nomor }}) {{ $item->indikator->standar->nama }}</td>
                    <td>{{ $item->indikator->pernyataan }}</td>
                    <td>({{ $item->indikator->no_iku }}) {{ $item->indikator->nama }}</td>
                    <td style="white-space: nowrap">{{ $item->tanggal->format('d-m-Y') }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->uraian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
