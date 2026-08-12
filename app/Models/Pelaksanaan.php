<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['indikator_id', 'tanggal', 'uraian', 'dokumen'])]
#[Hidden([])]

class Pelaksanaan extends Model
{
    use SoftDeletes;
    protected $table = 'pelaksanaan';

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function indikator(): BelongsTo
    {
        return $this->belongsTo(Indikator::class, 'indikator_id');
    }
}
