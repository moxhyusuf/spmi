<table>
    <thead>
        <tr>
            <th colspan="6" style="font-size: 16px; font-weight: bold; text-align: center;">
                LAPORAN PELAKSANAAN INDIKATOR MUTU
            </th>
        </tr>

        <tr>
            <th colspan="6" style="text-align: center;">
                Periode :
                {{ $tanggalMulai->format('d M Y') }}
                -
                {{ $tanggalSelesai->format('d M Y') }}
            </th>
        </tr>

        <tr></tr>

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
