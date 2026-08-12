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
                <td>{{ $item->indikator->unit }}</td>
                <td>{{ $item->uraian }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
