<?php

namespace Database\Seeders;

use App\Models\Pelaksanaan;
use Illuminate\Database\Seeder;

class PelaksanaanSeeder extends Seeder
{
    public function run(): void
    {
        $pelaksanaan = [
            [
                // indikator_id 1 => Indikator 1.1 milik Program Studi Sistem Informasi
                'indikator_id' => 1,
                'tanggal' => now(),
                'uraian' => 'Hasil tracer study menunjukkan 88% pengguna lulusan menilai sikap dan etika kerja lulusan Prodi Sistem Informasi dalam kategori baik dan sangat baik.',
                'dokumen' => 'dokumen/tracer-study-si.pdf',
            ],
            [
                // indikator_id 2 => Indikator 1.1 milik Program Studi Teknologi Informasi
                'indikator_id' => 2,
                'tanggal' => now(),
                'uraian' => 'Evaluasi pengguna lulusan Prodi Teknologi Informasi menunjukkan tingkat kepuasan terhadap etika kerja lulusan mencapai 90%.',
                'dokumen' => 'dokumen/evaluasi-pengguna-ti.pdf',
            ],
            [
                // indikator_id 3 => Indikator 1.1 milik Program Studi Sistem Informasi Akuntansi
                'indikator_id' => 3,
                'tanggal' => now(),
                'uraian' => 'Laporan survei alumni dan pengguna lulusan Prodi Sistem Informasi Akuntansi menunjukkan penilaian sikap kerja lulusan berada pada kategori baik.',
                'dokumen' => 'dokumen/survei-lulusan-sia.pdf',
            ],
        ];

        foreach ($pelaksanaan as $data) {
            Pelaksanaan::create($data);
        }
    }
}
