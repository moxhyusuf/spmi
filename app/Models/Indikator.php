<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['standard_id', 'pernyataan', 'no_iku', 'nama', 'target', 'unit'])]
#[Hidden([])]

class Indikator extends Model
{
    use SoftDeletes;
    protected $table = 'indikator';

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

    public function standar(): BelongsTo
    {
        return $this->belongsTo(Standar::class, 'standard_id');
    }

    public function pelaksanaan(): HasMany
    {
        return $this->hasMany(Pelaksanaan::class, 'indikator_id');
    }
}
