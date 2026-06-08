<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Seeder;

class IndikatorSeeder extends Seeder
{
    public function run(): void
    {

        $pernyataan = [
            // 1
            'Standar dan indikator lulusan yang mampu menunjukkan sikap dan karakter yang beretika, berintegritas dan berbudi pekerti yang mencerminkan ketakwaan kepada Tuhan Yang Maha Esa, peduli masalah sosial dan lingkungan, menghargai perbedaan dan kemajemukan, menjunjung tinggi',
            'Standar dan indikator lulusan yang mampu menyelesaikan pekerjaan, memformulasi-kan penyelesaian masalah prosedural bidang sistem informasi berdasarkan konsep teoritis yang dikuasai dari hasil kerja sendiri maupun kerja kelompok dalam bentuk laporan tertulis yang dapat dipertanggungjawabkan',
            'Standar dan indikator lulusan mampu mengelola pembelajaran diri sendiri, dan mengembangkan diri sebagai pribadi pembelajar sepanjang hayat untuk berkontribusi menyelesai-kan masalah dengan mengimplementasikan sistem informasi serta memahami kewirausahaan berbasis teknologi',
            // 2
            'Standar dan indikator tingkat kedalaman dan keluasan materi pembelajaran sesuai jenis, program, dan standar kompetensi lulusan, dengan memperhatikan perkembangan ilmu pengetahuan dan teknologi yang menjadi dasar keilmuan program studi, yang relevan dengan program studi, konsep baru yang dihasilkan dari penelitian terkini; dan dunia kerjayang relevan dengan profesi lulusan program studi',
            'Standar dan indikator materi pembelajaran diutamakan untuk menyiapkan lulusan agar mampu mengembangkan keterampilan dan penalaran melalui penerapan ilmu pengetahuan dan teknologi untuk melakukan pekerjaan dengan keahlian terapan tertentu',
            'Standar dan indikator materi pembelajaran disusun dalam kurikulum program studi dapat dinyatakan secara terpisah maupun terintegrasi dalam bentuk mata kuliah; modul; blok tematik; dan/atau bentuk lain',
            'Standar dan indikator kurikulum program studi minimal mencakup capaian pembelajaran lulusan; masa tempuh kurikulum; metode pembelajaran; modalitas pembelajaran; syarat kompetensi dan/atau kualifikasi calon mahasiswa; materi pembelajaran yang harus ditempuh; dan tata cara penerimaan mahasiswa',
            'Standar dan indikator kurikulum program studi merupakan kurikulum yang menggabungkan pembelajaran di perguruan tinggi dengan magang di dunia usaha, dunia industri, dunia kerja, dan/atau industri yang dikelola oleh perguruan tinggi',

        ];

        $indikator = [
            // * 1
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[0],
                'no_iku' => '1.1',
                'nama' => 'Pengguna lulusan menilai sikap dan etika kerja lulusan baik',
                'target' => '≥ 85% responden menyatakan sikap kerja lulusan baik/sangat baik'
            ],
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[0],
                'no_iku' => '1.2',
                'nama' => 'Lulusan aktif dalam kegiatan sosial, pengabdian, atau program peduli lingkungan',
                'target' => '≥ 75% lulusan terlibat dalam kegiatan sosial atau PkM selama masa studi'
            ],
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[0],
                'no_iku' => '1.3',
                'nama' => 'Tidak ada catatan pelanggaran hukum atau tindak kekerasan selama studi',
                'target' => '100% lulusan bebas dari catatan kriminal atau pelanggaran tata tertib kampus'
            ],

            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[1],
                'no_iku' => '2.1',
                'nama' => 'Mahasiswa dapat menyelesaikan tugas berbasis prosedur (misal: analisis kebutuhan, desain sistem, pemrograman, pengujian, dokumentasi)',
                'target' => '≥ 85% mahasiswa menyelesaikan proyek atau tugas akhir sesuai prosedur'
            ],
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[1],
                'no_iku' => '2.2',
                'nama' => 'Mahasiswa dapat bekerja mandiri dan kolaboratif (kerja kelompok proyek SI)',
                'target' => 'Seluruh mahasiswa menunjukkan kontribusi aktif dalam tim proyek'
            ],
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[1],
                'no_iku' => '2.3',
                'nama' => 'Mahasiswa mempertanggungjawabkan hasil kerja dalam sidang tugas akhir atau ujian proyek',
                'target' => '100% mahasiswa lulus ujian proyek akhir/tugas akhir'
            ],

            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[2],
                'no_iku' => '3.1',
                'nama' => 'Mahasiswa menunjukkan inisiatif dalam mencari, memilih, dan memanfaatkan sumber belajar secara mandiri',
                'target' => '≥ 85% mahasiswa aktif mengikuti pembelajaran di luar kelas, seperti webinar, atau pelatihan mandiri'
            ],
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[2],
                'no_iku' => '3.2',
                'nama' => 'Lulusan menunjukkan komitmen untuk terus belajar, terbuka terhadap pembaruan IPTEK',
                'target' => '≥ 90% lulusan memiliki rencana pengembangan diri pasca-lulus (pekerjaan, sertifikasi, pendidikan lanjut)'
            ],
            [
                'standard_id' => 1,
                'pernyataan' => $pernyataan[2],
                'no_iku' => '3.3',
                'nama' => 'Mahasiswa menunjukkan pemahaman konsep technopreneurship dan inovasi digital',
                'target' => '≥ 75% mahasiswa mengikuti kuliah/magang/kegiatan kewirausahaan berbasis TI'
            ],
            // * 2
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[3],
                'no_iku' => '1.1',
                'nama' => 'Persentase mata kuliah yang telah disusun berdasarkan CPL dan SKKNI/KKNI',
                'target' => '100% mata kuliah mengacu pada CPL dan KKNI'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[3],
                'no_iku' => '1.2',
                'nama' => 'Proporsi materi pada RPS yang menggambarkan kedalaman konsep, praktik, dan analisis sesuai jenjang D3 (level 5 KKNI)',
                'target' => '≥ 90% RPS menunjukkan kedalaman sesuai deskriptor KKNI level 5'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[3],
                'no_iku' => '1.3',
                'nama' => 'Persentase materi dan studi kasus yang menggambarkan kebutuhan industri/profesi lulusan',
                'target' => '≥ 80% mata kuliah praktik dan proyek berbasis dunia kerja'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[3],
                'no_iku' => '1.4',
                'nama' => 'Frekuensi pembaruan materi pembelajaran berdasarkan tren teknologi dan industri terbaru',
                'target' => 'Pembaruan dilakukan minimal 1x setiap 3 tahun atau ketika ada perkembangan signifikan'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[4],
                'no_iku' => '2.1',
                'nama' => 'Persentase SKS praktik dalam kurikulum (praktikum, proyek, kerja lapangan, magang)',
                'target' => '≥ 60% dari total SKS berorientasi praktik dan keahlian terapan'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[4],
                'no_iku' => '2.2',
                'nama' => 'Jumlah mata kuliah yang mewajibkan tugas proyek berbasis pemecahan masalah nyata di dunia kerja',
                'target' => '≥ 70% mata kuliah inti memuat proyek atau studi kasus berbasis dunia kerja'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[4],
                'no_iku' => '2.3',
                'nama' => 'Persentase RPS yang menggunakan metode pembelajaran berbasis project-based learning (PBL), case method, atau experiential learning',
                'target' => '≥ 70% RPS mencantumkan metode pembelajaran aktif dan kontekstual'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[4],
                'no_iku' => '2.4',
                'nama' => 'Tingkat kesesuaian materi ajar menurut pengguna lulusan',
                'target' => '≥ 80% pengguna lulusan menyatakan materi pembelajaran relevan'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[5],
                'no_iku' => '3.1',
                'nama' => 'Proporsi materi pembelajaran yang disusun dalam berbagai bentuk (mata kuliah, modul, blok tematik, project)',
                'target' => '≥ 60% materi pembelajaran disusun tidak hanya dalam bentuk mata kuliah konvensional, tetapi juga modul atau tema integratif'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.1',
                'nama' => 'CPL dirumuskan mengacu pada KKNI/SKKNI dan relevan dengan profil lulusan',
                'target' => 'CPL lengkap, valid, terpublikasi, dan dijadikan dasar penyusunan RPS'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.2',
                'nama' => 'Masa tempuh kurikulum dirancang untuk sesuai standar D3',
                'target' => 'Diselesaikan dalam waktu 3 tahun (6 semester)'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.3',
                'nama' => 'Metode pembelajaran sesuai dengan jenjang vokasi (project-based, case method, magang)',
                'target' => '≥ 70% mata kuliah mencantumkan metode project-based, case method, magang'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.4',
                'nama' => 'Tersedia penjelasan dan penerapan berbagai modalitas (tatap muka, daring, hybrid, praktik, magang)',
                'target' => 'Semua modalitas pembelajaran dijelaskan dan diimplementasikan sesuai kebutuhan mata kuliah'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.5',
                'nama' => 'Perumusan syarat masuk calon mahasiswa relevan dengan kebutuhan program studi',
                'target' => 'Syarat kompetensi masuk tersedia dan terpublikasi secara resmi'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.6',
                'nama' => 'Materi pembelajaran (mata kuliah) disusun dalam struktur kurikulum yang linier dan mendukung CPL',
                'target' => 'Semua materi pembelajaran tertata dalam struktur semester yang logis'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[6],
                'no_iku' => '4.7',
                'nama' => 'Terdapat sistem dan prosedur penerimaan mahasiswa baru',
                'target' => 'Memiliki SOP dan diumumkan kepada publik'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[7],
                'no_iku' => '5.1',
                'nama' => 'Magang atau PKL tercantum dalam struktur kurikulum sebagai mata kuliah wajib',
                'target' => 'Magang ≥ 1 semester dengan bobot maksimal 20 SKS'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[7],
                'no_iku' => '5.2',
                'nama' => 'Ada pemetaan capaian pembelajaran (CPMK/CPL) yang dicapai melalui kegiatan magang',
                'target' => '≥ 3 CPL utama dicapai melalui pengalaman magang'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[7],
                'no_iku' => '5.3',
                'nama' => 'Persentase mitra magang yang relevan dengan bidang keahlian program studi',
                'target' => '≥ 90% mitra berasal dari DUDIKA yang relevan dengan profil lulusan'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[7],
                'no_iku' => '5.4',
                'nama' => 'Persentase mahasiswa yang menjalani magang sesuai kurikulum',
                'target' => '100% mahasiswa mengikuti magang'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[7],
                'no_iku' => '5.5',
                'nama' => 'Terdapat mekanisme penilaian kinerja magang yang melibatkan pembimbing lapangan dan dosen',
                'target' => 'Semua kegiatan magang memiliki instrumen penilaian berbasis CPL'
            ],
            [
                'standard_id' => 2,
                'pernyataan' => $pernyataan[7],
                'no_iku' => '5.6',
                'nama' => 'Persentase mahasiswa yang mengaitkan pengalaman magang dengan tugas akhir, proyek, atau portofolio',
                'target' => '≥ 70% mahasiswa mengintegrasikan pengalaman magang ke dalam proyek akhir'
            ],

        ];

        foreach ($indikator as $data) {
            Indikator::create($data);
        }
    }
}
