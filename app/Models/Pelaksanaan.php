<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['indikator_id', 'unit', 'tanggal', 'uraian', 'dokumen'])]
#[Hidden([])]

class Pelaksanaan extends Model
{
    use SoftDeletes;
    protected $table = 'pelaksanaan';

    const UNIT = [
        'Pusat Penjaminan Mutu',
        'Lembaga Penelitian dan Pengabdian Masyarakat',
        'Unit Kerjasama & Pengembangan Institusi',
        'Program Studi Sistem Informasi',
        'Program Studi Sistem Informasi Akuntansi',
        'Program Studi Teknologi Informasi',
        'Bagian Administrasi Umum & Keuangan',
        'Bagian Administrasi Akademik',
        'Bagian Sistem Informasi, Humas & Layanan',
        'Bagian Kemahasiswaan',
        'Bagian Alumni & Pusat Karir',
        'UPT Perpustakaan & Kearsipan'
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function indikator(): BelongsTo
    {
        return $this->belongsTo(Indikator::class, 'indikator_id');
    }
}
