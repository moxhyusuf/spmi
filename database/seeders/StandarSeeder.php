<?php

namespace Database\Seeders;

use App\Models\Standar;
use Illuminate\Database\Seeder;

class StandarSeeder extends Seeder
{
    public function run(): void
    {
        $standar = [
            [
                'nomor' => 'std-1.1/atp',
                'nama' => 'standar kompetensi lulusan',
                'tanggal_perumusan' => '2023-10-17',
                'tanggal_pengesahan' => '2025-02-25'
            ],
            [
                'nomor' => 'std-1.3.1/atp',
                'nama' => 'standar isi pembelajaran',
                'tanggal_perumusan' => '2023-10-17',
                'tanggal_pengesahan' => '2025-02-27'
            ],
            [
                'nomor' => 'std-1.2.1/atp',
                'nama' => 'standar proses pembelajaran',
                'tanggal_perumusan' => '2023-10-17',
                'tanggal_pengesahan' => '2025-02-27'
            ],
            [
                'nomor' => 'std-1.2.2/atp',
                'nama' => 'standar penilaian pembelajaran',
                'tanggal_perumusan' => '2023-10-17',
                'tanggal_pengesahan' => '2025-02-27'
            ],
        ];

        foreach ($standar as $data) {
            Standar::create($data);
        }
    }
}
